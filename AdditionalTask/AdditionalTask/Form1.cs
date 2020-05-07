using System;
using System.Windows.Forms;

namespace AdditionalTask
{
    public partial class MainForm : Form
    {
        private readonly Data _source;
        private readonly Binding _binding;

        public MainForm()
        {
            InitializeComponent();

            _source = new Data();
            _source.Statistic = "Wait some seconds";

            _binding = new Binding(_source, "Statistic", data_textBox, "Text");                   
            
            bt_Close.Click += CloseApplication;

            var timer = new Timer();
            timer.Tick += new EventHandler(Timer);
            timer.Interval = 2000;
            timer.Start();

        }

        private void CloseApplication(object sender, EventArgs e)
        {
            Application.Exit();
        }

        private void Timer(object sender, EventArgs e)
        {
            var statistic = new StatisticBuilder();
            statistic.UpdateStatistic();
            _source.Statistic = statistic.Statistic;
        }
    }
}
  


