using System;
using System.Windows.Automation;
using System.Diagnostics;
using SHDocVw;
using mshtml;
using System.Collections.Generic;

namespace AdditionalTask
{
    public static class BrowserManager
    {
        public static List<string> GetAllIEurl()
        {
            var stringList = new List<string>();
            IHTMLDocument2 myDoc;
            ShellWindows shellWindows = new ShellWindows();
            foreach (InternetExplorer ie in shellWindows)
            {
                var filename = System.IO.Path.GetFileNameWithoutExtension(ie.FullName).ToLower();
                if ((filename == "iexplore"))
                {
                    var browser = ie;
                    myDoc = browser.Document;
                    stringList.Add(myDoc.url);                
                }
            }
            return stringList;
        }

        public static List<string> GetChromeActiveUrl()
        {
            var stringList = new List<string>();

            Process[] procsChrome = Process.GetProcessesByName("chrome");

            foreach (Process chrome in procsChrome)
            {
                if (chrome.MainWindowHandle == IntPtr.Zero)
                    continue;

                AutomationElement element = AutomationElement.FromHandle(chrome.MainWindowHandle);
                if (element != null)
                {

                    Condition conditions = new AndCondition(
                        new PropertyCondition(AutomationElement.ProcessIdProperty, chrome.Id),
                        new PropertyCondition(AutomationElement.IsControlElementProperty, true),
                        new PropertyCondition(AutomationElement.IsContentElementProperty, true),
                        new PropertyCondition(AutomationElement.ControlTypeProperty, ControlType.Edit));

                    AutomationElement elementx = element.FindFirst(TreeScope.Descendants, conditions);
                    var value = ((ValuePattern)elementx.GetCurrentPattern(ValuePattern.Pattern)).Current.Value as string;
                    stringList.Add(value);
                }
            }
            return stringList;
        }

        public static List<string> GetMozillaActiveUrl()
        {
            var stringList = new List<string>();

            Process[] procsChrome = Process.GetProcessesByName("firefox");

            foreach (Process chrome in procsChrome)
            {
                if (chrome.MainWindowHandle == IntPtr.Zero)
                    continue;

                AutomationElement element = AutomationElement.FromHandle(chrome.MainWindowHandle);
                if (element != null)
                {

                    Condition conditions = new AndCondition(
                        new PropertyCondition(AutomationElement.ProcessIdProperty, chrome.Id),
                        new PropertyCondition(AutomationElement.IsControlElementProperty, true),
                        new PropertyCondition(AutomationElement.IsContentElementProperty, true),
                        new PropertyCondition(AutomationElement.NameProperty, "Найдите в Google или введите адрес", PropertyConditionFlags.IgnoreCase),
                        new PropertyCondition(AutomationElement.ControlTypeProperty, ControlType.Edit));

                    AutomationElement elementx = element.FindFirst(TreeScope.Descendants, conditions);
                    if (elementx != null)
                    {
                        var value = ((ValuePattern)elementx.GetCurrentPattern(ValuePattern.Pattern)).Current.Value as string;
                        stringList.Add(value);
                    }
                }
            }
            return stringList;
        }
    }
}
