package com.example.praktikum3;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
import android.content.Intent;

public class MainActivity extends AppCompatActivity {

    EditText e;
    TextView t;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        e = (EditText) findViewById(R.id.editText);
        Button b = (Button) findViewById(R.id.button);

        t = (TextView) findViewById(R.id.textView3);

        Button b1 = (Button) findViewById(R.id.btn_menu_view);
        Button b2 = (Button) findViewById(R.id.btn_menu_kuadrat);
        Button b3 = (Button) findViewById(R.id.btn_menu_makanan);
        Button b4 = (Button) findViewById(R.id.btn_menu_view2);

        b1.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                startActivity(new Intent(MainActivity.this, MainActivity.class));
                finish();
            }
        });
        b2.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                startActivity(new Intent(MainActivity.this, Main2Activity.class));
                finish();
            }
        });
        b3.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                startActivity(new Intent(MainActivity.this, Main3Activity.class));
                finish();
            }
        });
        b4.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                startActivity(new Intent(MainActivity.this, Main4Activity.class));
                finish();
            }
        });
    }

    public void proses(View view) {
        String pesan = e.getText().toString();
        t.setText(pesan);
    }

}
