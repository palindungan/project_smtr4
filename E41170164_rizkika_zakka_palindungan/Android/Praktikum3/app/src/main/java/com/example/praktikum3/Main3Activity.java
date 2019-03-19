package com.example.praktikum3;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.CheckBox;
import android.widget.CompoundButton.OnCheckedChangeListener;
import android.widget.TextView;

public class Main3Activity extends AppCompatActivity {

    int sum = 0;
    TextView t;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main3);

        final CheckBox cb1 = (CheckBox) findViewById(R.id.checkBox);
        final CheckBox cb2 = (CheckBox) findViewById(R.id.checkBox2);
        final CheckBox cb3 = (CheckBox) findViewById(R.id.checkBox3);

        Button btn_pesan = (Button) findViewById(R.id.button3);

        t = (TextView) findViewById(R.id.textView9);

        Button b1 = (Button) findViewById(R.id.btn_menu_view);
        Button b2 = (Button) findViewById(R.id.btn_menu_kuadrat);
        Button b3 = (Button) findViewById(R.id.btn_menu_makanan);
        Button b4 = (Button) findViewById(R.id.btn_menu_view2);

        btn_pesan.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                sum = 0;
                if(cb1.isChecked())
                {
                    sum = sum + 5000;
                }

                if(cb2.isChecked())
                {
                    sum = sum + 6000;
                }

                if(cb3.isChecked())
                {
                    sum = sum + 12000;
                }

                String hasil1 = String.valueOf(sum);
                t.setText(hasil1);

            }
        });

        b1.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                startActivity(new Intent(Main3Activity.this, MainActivity.class));
                finish();
            }
        });
        b2.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                startActivity(new Intent(Main3Activity.this, Main2Activity.class));
                finish();
            }
        });
        b3.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                startActivity(new Intent(Main3Activity.this, Main3Activity.class));
                finish();
            }
        });
        b4.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                startActivity(new Intent(Main3Activity.this, Main4Activity.class));
                finish();
            }
        });
    }
}
