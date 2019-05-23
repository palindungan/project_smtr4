package com.example.sicat.activities;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;

import com.example.sicat.R;
import com.example.sicat.controllers.SessionManager;

public class HomeActivity extends AppCompatActivity {

    // deklarasi
    SessionManager sessionManager; // session

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_home);

        // inisialisasi ojek session
        sessionManager = new SessionManager(this);
        sessionManager.checkLogin(); // untuk mengecek apakah sudah login apa belum

    }
}
