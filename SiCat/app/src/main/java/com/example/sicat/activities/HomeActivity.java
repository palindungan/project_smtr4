package com.example.sicat.activities;

import android.app.ProgressDialog;
import android.content.Context;
import android.content.DialogInterface;
import android.content.Intent;
import android.graphics.Bitmap;
import android.net.Uri;
import android.nfc.Tag;
import android.provider.MediaStore;
import android.support.annotation.NonNull;
import android.support.annotation.Nullable;
import android.support.design.widget.NavigationView;
import android.support.v4.widget.DrawerLayout;
import android.support.v7.app.ActionBarDrawerToggle;
import android.support.v7.app.AlertDialog;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Base64;
import android.util.Log;
import android.view.Menu;
import android.view.MenuInflater;
import android.view.MenuItem;
import android.view.View;
import android.view.inputmethod.InputMethodManager;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.example.sicat.Database.DataSource.CartRepository;
import com.example.sicat.Database.Local.CartDataSource;
import com.example.sicat.Database.Local.CartDatabase;
import com.example.sicat.R;
import com.example.sicat.activities.daftar_menu.MenuActivity;
import com.example.sicat.common.Common;
import com.example.sicat.controllers.SessionManager;
import com.nex3z.notificationbadge.NotificationBadge;

import org.json.JSONException;
import org.json.JSONObject;

import java.io.ByteArrayOutputStream;
import java.io.IOException;
import java.util.HashMap;
import java.util.Map;

import de.hdodenhof.circleimageview.CircleImageView;

public class HomeActivity extends AppCompatActivity {

    // deklarasi
    SessionManager sessionManager; // session
    String getID;

    private Button link_daftar_menu, btn_daftar_bonus , btn_prasmanan; // btn

    // deklarasi untuk drawer
    private DrawerLayout dl;
    private ActionBarDrawerToggle t;
    private NavigationView nv;

    NotificationBadge badge;
    ImageView cart_icon;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_home);

        // inisialisasi ojek session
        sessionManager = new SessionManager(this);
        // untuk menerima data dari session
        HashMap<String , String> customer = sessionManager.getCustomerDetail();
        getID = customer.get(sessionManager.ID_CUSTOMER);

        link_daftar_menu = findViewById(R.id.link_daftar_menu);
        btn_daftar_bonus = findViewById(R.id.btn_daftar_bonus);
        btn_prasmanan = findViewById(R.id.btn_prasmanan);

        // untuk drawer
        dl = (DrawerLayout) findViewById(R.id.activity_home);
        t = new ActionBarDrawerToggle(this, dl, R.string.Open, R.string.Close);

        dl.addDrawerListener(t);
        t.syncState();

        getSupportActionBar().setDisplayHomeAsUpEnabled(true);

        nv = (NavigationView) findViewById(R.id.nv);

        nv.setNavigationItemSelectedListener(new NavigationView.OnNavigationItemSelectedListener() {
            @Override
            public boolean onNavigationItemSelected(@NonNull MenuItem item) {
                int id = item.getItemId();
                switch (id) {
                    case R.id.account:
                        startActivity(new Intent(HomeActivity.this, AccountActivity.class));
                        break;
                    case R.id.log_out:
                        sessionManager.logout();
                        break;
                    case  R.id.transaksi_list:
                        startActivity(new Intent(HomeActivity.this, TransaksiListActivity.class));
                        break;
                    default:
                        return true;
                }
                return true;
            }
        });

        link_daftar_menu.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(HomeActivity.this, MenuActivity.class);
                startActivity(intent); // membuka activity lain
            }
        });

        btn_daftar_bonus.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                // masuk ke dalam daftar bonus
                Intent intent = new Intent(HomeActivity.this, DaftarBonusActivity.class);
                startActivity(intent); // membuka activity lain
            }
        });

        // init database
        iniDB();

        btn_prasmanan.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                showDialog();
            }
        });
    }

    private void iniDB() {
        Common.cartDatabase = CartDatabase.getInstance(this);
        Common.cartRepository = CartRepository.getInstance(CartDataSource.getInstance(Common.cartDatabase.cartDAO()));
    }

    // method untuk menciptakan option menu
    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        getMenuInflater().inflate(R.menu.menu_action_bar, menu);

        View view = menu.findItem(R.id.cart_menu).getActionView();
        badge = (NotificationBadge)view.findViewById(R.id.badge);
        cart_icon = (ImageView)view.findViewById(R.id.cart_icon);

        cart_icon.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                startActivity(new Intent(HomeActivity.this,CartActivity.class));
            }
        });

        updateCartCount();

        return true;
    }

    private void updateCartCount() {
        if(badge == null) return;
        runOnUiThread(new Runnable() {
            @Override
            public void run() {
                if (Common.cartRepository.countCartItems() == 0)
                    badge.setVisibility(View.INVISIBLE);
                else {
                    badge.setVisibility(View.VISIBLE);
                    badge.setText(String.valueOf(Common.cartRepository.countCartItems()));
                }
            }
        });

    }

    // method untuk aksi option menu (jika di pilih / click)
    @Override
    public boolean onOptionsItemSelected(MenuItem item) {

        int id = item.getItemId();

        if (t.onOptionsItemSelected(item)) {
            return true;
        }
        if (id == R.id.cart_menu){
            return true;
        }

        return super.onOptionsItemSelected(item);
    }

    @Override
    protected void onResume() {
        super.onResume();
        updateCartCount();
    }

    private void showDialog(){
        AlertDialog.Builder alertDialogBuilder = new AlertDialog.Builder(
                this);

        // set title dialog
        alertDialogBuilder.setTitle("Ingin Membuat Keranjang Baru ?");

        // set pesan dari dialog
        alertDialogBuilder
                .setMessage("Klik Ya untuk membuat baru !")
                .setPositiveButton("Ya",new DialogInterface.OnClickListener() {
                    public void onClick(DialogInterface dialog,int id) {
                        Common.cartRepository.emptyCart();
                        startActivity(new Intent(HomeActivity.this,PaketListActivity.class));
                    }
                })
                .setNegativeButton("Tidak",new DialogInterface.OnClickListener() {
                    public void onClick(DialogInterface dialog, int id) {
                        dialog.cancel();
                    }
                });

        // membuat alert dialog dari builder
        AlertDialog alertDialog = alertDialogBuilder.create();

        // menampilkan alert dialog
        alertDialog.show();
    }
}
