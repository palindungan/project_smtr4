package com.example.praktikum4;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;

import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.Spinner;
import android.widget.Toast;

public class Main2Activity extends AppCompatActivity {

    //deklarasi spiner
    Spinner s;

    //deklarasi array bernama jurusan
    String[] jurusan = {"Teknik Informatika", "Multimedia Broadcasting", "Animasi", "Otomotif",
            "Griya Kayu", "Pengelohan Hasil Laut", "Pengolahan Batu Mulia", "Telekomunikasi",
            "Elektronika", "Mekatronika", "Kimia", "Fisika", "Matematika", "Perkapalan"};

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main2);

        // mengambil nilai spiner
        s = (Spinner) findViewById(R.id.spinner);

        //membuat adapter yang berisi array = arrayAdapter
        ArrayAdapter<String> adapter = new ArrayAdapter<String>(this, android.R.layout.simple_spinner_dropdown_item, jurusan);

        //memasukkan adapter ke spiner yang bernama s
        s.setAdapter(adapter);

        //onclick Listerner pada spiner bernama s
        s.setOnItemSelectedListener(new AdapterView.OnItemSelectedListener() {
            public void onItemSelected(AdapterView<?> arg0, View arg1, int arg2, long arg3) {
                int index = s.getSelectedItemPosition();
                Toast.makeText(getBaseContext(), "You have selected item l: " + jurusan[index], Toast.LENGTH_SHORT).show();
            }

            public void onNothingSelected(AdapterView<?> arg0) {
            }
        });

        // Deklarasi Button Menu
        Button b1 = (Button) findViewById(R.id.button1);
        Button b2 = (Button) findViewById(R.id.button2);
        Button b3 = (Button) findViewById(R.id.button3);
        Button b4 = (Button) findViewById(R.id.button4);
        Button b5 = (Button) findViewById(R.id.button5);

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
        b5.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                startActivity(new Intent(Main2Activity.this, Main5Activity.class));
                finish();
            }
        });
    }
}
