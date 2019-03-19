package com.example.praktikum3;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;

public class Main2Activity extends AppCompatActivity {

    EditText input1;
    Button submit1;
    TextView view1;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main2);
        input1 = (EditText) findViewById(R.id.editText2);
        submit1 = (Button) findViewById(R.id.button2);
        view1 = (TextView) findViewById(R.id.textView4);

        Button b1 = (Button) findViewById(R.id.btn_menu_view);
        Button b2 = (Button) findViewById(R.id.btn_menu_kuadrat);
        Button b3 = (Button) findViewById(R.id.btn_menu_makanan);
        Button b4 = (Button) findViewById(R.id.btn_menu_view2);

        b1.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                startActivity(new Intent(Main2Activity.this, MainActivity.class));
                finish();
            }
        });
        b2.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                startActivity(new Intent(Main2Activity.this, Main2Activity.class));
                finish();
            }
        });
        b3.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                startActivity(new Intent(Main2Activity.this, Main3Activity.class));
                finish();
            }
        });
        b4.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                startActivity(new Intent(Main2Activity.this, Main4Activity.class));
                finish();
            }
        });

        submit1.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                String pesan = input1.getText().toString();
                Integer result = Integer.valueOf(pesan)*Integer.valueOf(pesan);
                String kuadrat = String.valueOf(result);

                view1.setText(kuadrat);
            }
        });

    }
}
