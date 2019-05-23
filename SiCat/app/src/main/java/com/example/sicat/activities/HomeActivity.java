package com.example.sicat.activities;

import android.content.Context;
import android.support.annotation.NonNull;
import android.support.design.widget.NavigationView;
import android.support.v4.widget.DrawerLayout;
import android.support.v7.app.ActionBarDrawerToggle;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.MenuItem;
import android.view.inputmethod.InputMethodManager;
import android.widget.Toast;

import com.example.sicat.R;
import com.example.sicat.controllers.SessionManager;

public class HomeActivity extends AppCompatActivity {

    // deklarasi
    SessionManager sessionManager; // session

    // deklarasi untuk drawer
    private DrawerLayout dl;
    private ActionBarDrawerToggle t;
    private NavigationView nv;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_home);

        // inisialisasi ojek session
        sessionManager = new SessionManager(this);
        sessionManager.checkLogin(); // untuk mengecek apakah sudah login apa belum

        // untuk drawer
        dl = (DrawerLayout)findViewById(R.id.activity_home);
        t = new ActionBarDrawerToggle(this, dl,R.string.Open, R.string.Close);

        dl.addDrawerListener(t);
        t.syncState();

        getSupportActionBar().setDisplayHomeAsUpEnabled(true);

        nv = (NavigationView)findViewById(R.id.nv);

        nv.setNavigationItemSelectedListener(new NavigationView.OnNavigationItemSelectedListener() {
            @Override
            public boolean onNavigationItemSelected(@NonNull MenuItem item) {
                int id = item.getItemId();
                switch(id)
                {
                    case R.id.account:
                        Toast.makeText(HomeActivity.this, "My Account",Toast.LENGTH_SHORT).show();break;
                    case R.id.settings:
                        Toast.makeText(HomeActivity.this, "Settings",Toast.LENGTH_SHORT).show();break;
                    case R.id.mycart:
                        Toast.makeText(HomeActivity.this, "My Cart",Toast.LENGTH_SHORT).show();break;
                    case R.id.log_out:
                        sessionManager.logout();
                    default:
                        return true;
                }

                return true;

            }
        });

    }

    // method untuk aksi option menu (jika di pilih / click)
    @Override
    public boolean onOptionsItemSelected(MenuItem item) {

        if(t.onOptionsItemSelected(item)) {
            return true;
        }

        return super.onOptionsItemSelected(item);
    }
}
