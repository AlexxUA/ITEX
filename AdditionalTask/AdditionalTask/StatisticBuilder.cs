using System.Text;
using System.Collections.Generic;

namespace AdditionalTask
{
    public class StatisticBuilder
    {
        public string Statistic { private set; get; }

        public void UpdateStatistic()
        {
           var stringBuilder = new StringBuilder();

           stringBuilder.AppendLine("IE all opened URL: ");
           var ie = BrowserManager.GetAllIEurl();
           AddByForech(ref stringBuilder, ie);

            stringBuilder.AppendLine("Mozilla last opened URL: ");
            var mozilla = BrowserManager.GetMozillaActiveUrl();
            AddByForech(ref stringBuilder, mozilla);
            
            stringBuilder.AppendLine("Chrome last opened URL: ");
            var chrome = BrowserManager.GetChromeActiveUrl();
            AddByForech(ref stringBuilder, chrome);
            
            Statistic = stringBuilder.ToString();
        }
        private void AddByForech(ref StringBuilder sb, IEnumerable<string> elements)
        {
            foreach (var element in elements)
            {
                sb.AppendLine(element);
            }
        }
    }
}
