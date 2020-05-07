using System;
using System.ComponentModel;
using System.Reflection;

namespace AdditionalTask
{
    public class Binding
    {
        private object _source;
        private object _view;
        private PropertyInfo _sourceProperty;
        private PropertyInfo _viewProperty;
        private Type _sourceType;
        private Type _viewType;

        public Binding(object source, string sourcePropertyName,
                        object target, string targetPropertyName)
        {
            _source = source;
            _view = target;

            _sourceType = source.GetType();
            _sourceProperty = _sourceType.GetProperty(sourcePropertyName);

            _viewType = target.GetType();
            _viewProperty = _viewType.GetProperty(targetPropertyName);

            var eventInfo = _sourceType.GetEvent("PropertyChanged");
            PropertyChangedEventHandler del = (s, args) => UpdateFromSource();
            eventInfo.AddEventHandler(source, del);

            UpdateFromSource();
        }

        public void UpdateFromSource()
        {
            var value = _sourceType.InvokeMember(_sourceProperty.Name,
                        BindingFlags.GetField | BindingFlags.GetProperty,
                        null, _source, null);

            _viewType.InvokeMember(_viewProperty.Name,
                         BindingFlags.SetField | BindingFlags.SetProperty,
                         null, _view, new object[] { value });
        }

        public void UpdateSource()
        {
            var value = _viewType.InvokeMember(_viewProperty.Name,
                        BindingFlags.GetField | BindingFlags.GetProperty,
                        null, _view, null);

            _sourceType.InvokeMember(_sourceProperty.Name,
                         BindingFlags.SetField | BindingFlags.SetProperty,
                         null, _source, new object[] { value });
        }
    }
}
