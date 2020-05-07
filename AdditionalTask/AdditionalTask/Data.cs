using System.ComponentModel;

namespace AdditionalTask
{
    public class Data:INotifyPropertyChanged
    {
        private string _statistic;

        public event PropertyChangedEventHandler PropertyChanged;

        private static readonly PropertyChangedEventArgs _statisticChange
             = new PropertyChangedEventArgs("Statistic");

        public string Statistic
        {
            get { return _statistic; }
                 
            set
            {
                _statistic = value;
                PropertyChanged?.Invoke(this, _statisticChange);
            }
        }
    }
}
