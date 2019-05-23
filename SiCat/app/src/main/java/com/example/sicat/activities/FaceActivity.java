package com.example.sicat.activities;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.ProgressBar;
import android.widget.TextView;

import com.example.sicat.R;

public class FaceActivity extends AppCompatActivity {

    // deklarasi variabel
    private Button btn_login,link_regist; // button
    private ProgressBar loading; // loading

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_face);

        // inisialisasi
        btn_login = findViewById(R.id.btn_login);
        link_regist = findViewById(R.id.link_regist);
        loading = findViewById(R.id.loading);

        // jika btn_login di click
        btn_login.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                loading.setVisibility(View.VISIBLE);
                startActivity(new Intent(FaceActivity.this,LoginActivity.class));
                btn_login.setVisibility(View.VISIBLE);
            }
        });

        // jika link_regist di click
        link_regist.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                loading.setVisibility(View.VISIBLE);
                startActivity(new Intent(FaceActivity.this,RegisterActivity.class));
                btn_login.setVisibility(View.VISIBLE);
            }
        });

    }
}
