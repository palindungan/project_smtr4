package com.example.praktikum3;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;

public class Main4Activity extends AppCompatActivity {

    EditText et1;
    EditText et2;
    TextView tv1;
    TextView tv2;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main4);

        et1 = (EditText) findViewById(R.id.editText3);
        et2 = (EditText) findViewById(R.id.editText4);

        Button btn1 = (Button) findViewById(R.id.button4);

        tv1 = (TextView) findViewById(R.id.textView14);
        tv2 = (TextView) findViewById(R.id.textView15);

        Button b1 = (Button) findViewById(R.id.btn_menu_view);
        Button b2 = (Button) findViewById(R.id.btn_menu_kuadrat);
        Button b3 = (Button) findViewById(R.id.btn_menu_makanan);
        Button b4 = (Button) findViewById(R.id.btn_menu_view2);

        b1.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                startActivity(new Intent(Main4Activity.this, MainActivity.class));
                finish();
            }
        });
        b2.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                startActivity(new Intent(Main4Activity.this, Main2Activity.class));
                finish();
            }
        });
        b3.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                startActivity(new Intent(Main4Activity.this, Main3Activity.class));
                finish();
            }
        });
        b4.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                startActivity(new Intent(Main4Activity.this, Main4Activity.class));
                finish();
            }
        });

        btn1.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                String pesan = et1.getText().toString();
                tv1.setText(pesan);
                String pesan2 = et2.getText().toString();
                tv2.setText(pesan2);
            }
        });

    }
}
