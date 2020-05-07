namespace AdditionalTask
{
    partial class MainForm
    {
        /// <summary>
        /// Обязательная переменная конструктора.
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary>
        /// Освободить все используемые ресурсы.
        /// </summary>
        /// <param name="disposing">истинно, если управляемый ресурс должен быть удален; иначе ложно.</param>
        protected override void Dispose(bool disposing)
        {
            if (disposing && (components != null))
            {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        #region Код, автоматически созданный конструктором форм Windows

        /// <summary>
        /// Требуемый метод для поддержки конструктора — не изменяйте 
        /// содержимое этого метода с помощью редактора кода.
        /// </summary>
        private void InitializeComponent()
        {
            this.DataLabel = new System.Windows.Forms.Label();
            this.bt_Close = new System.Windows.Forms.Button();
            this.data_textBox = new System.Windows.Forms.RichTextBox();
            this.SuspendLayout();
            // 
            // DataLabel
            // 
            this.DataLabel.AutoSize = true;
            this.DataLabel.Font = new System.Drawing.Font("Microsoft Sans Serif", 24F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(204)));
            this.DataLabel.ForeColor = System.Drawing.Color.FromArgb(((int)(((byte)(255)))), ((int)(((byte)(128)))), ((int)(((byte)(0)))));
            this.DataLabel.Location = new System.Drawing.Point(24, 29);
            this.DataLabel.Name = "DataLabel";
            this.DataLabel.Size = new System.Drawing.Size(682, 37);
            this.DataLabel.TabIndex = 1;
            this.DataLabel.Text = "Active URL at IE,Mozilla and Chrome browsers";
            // 
            // bt_Close
            // 
            this.bt_Close.BackColor = System.Drawing.Color.Black;
            this.bt_Close.ForeColor = System.Drawing.Color.FromArgb(((int)(((byte)(255)))), ((int)(((byte)(128)))), ((int)(((byte)(0)))));
            this.bt_Close.Location = new System.Drawing.Point(712, 29);
            this.bt_Close.Name = "bt_Close";
            this.bt_Close.Size = new System.Drawing.Size(181, 37);
            this.bt_Close.TabIndex = 2;
            this.bt_Close.Text = "Close";
            this.bt_Close.UseVisualStyleBackColor = false;
            // 
            // data_textBox
            // 
            this.data_textBox.BackColor = System.Drawing.SystemColors.InactiveCaptionText;
            this.data_textBox.ForeColor = System.Drawing.Color.FromArgb(((int)(((byte)(255)))), ((int)(((byte)(128)))), ((int)(((byte)(0)))));
            this.data_textBox.Location = new System.Drawing.Point(12, 72);
            this.data_textBox.Name = "data_textBox";
            this.data_textBox.Size = new System.Drawing.Size(881, 344);
            this.data_textBox.TabIndex = 3;
            this.data_textBox.Text = "";
            // 
            // MainForm
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.BackColor = System.Drawing.SystemColors.ActiveCaptionText;
            this.ClientSize = new System.Drawing.Size(905, 450);
            this.ControlBox = false;
            this.Controls.Add(this.data_textBox);
            this.Controls.Add(this.bt_Close);
            this.Controls.Add(this.DataLabel);
            this.Name = "MainForm";
            this.RightToLeft = System.Windows.Forms.RightToLeft.No;
            this.Text = "Ursaize/ITEX";
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion
        private System.Windows.Forms.Label DataLabel;
        private System.Windows.Forms.Button bt_Close;
        private System.Windows.Forms.RichTextBox data_textBox;
    }
}

