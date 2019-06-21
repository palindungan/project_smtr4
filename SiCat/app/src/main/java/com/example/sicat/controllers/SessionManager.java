package com.example.sicat.controllers;

import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;

import com.example.sicat.activities.AccountActivity;
import com.example.sicat.activities.FaceActivity;
import com.example.sicat.activities.HomeActivity;
import com.example.sicat.activities.LoginActivity;
import com.example.sicat.common.Common;

import java.util.HashMap;

public class SessionManager {

    // deklarasi variable
    SharedPreferences sharedPreferences;
    public SharedPreferences.Editor editor;
    public Context context;
    int PRIVATE_MODE = 0;

    private static final String PREF_NAME = "LOGIN";
    private static final String LOGIN = "IS_LOGIN";

    public static final String ID_CUSTOMER = "ID_CUSTOMER";
    public static final String NM_CUSTOMER = "NM_CUSTOMER";
    public static final String ALMT_CUSTOMER = "ALMT_CUSTOMER";
    public static final String JENKEL_CUSTOMER = "JENKEL_CUSTOMER";
    public static final String NO_HP = "NO_HP";
    public static final String EMAIL = "EMAIL";
    public static final String USERNAME = "USERNAME";

    public String CART_STATUS = "CART_STATUS";
    public String ID_PAKET = "ID_PAKET";
    public String NM_PAKET = "NM_PAKET";
    public String HRG_PAKET = "HRG_PAKET";
    public String JML_MENU = "JML_MENU";
    public String JML_BONUS = "JML_BONUS";

    public String GANTI_STATUS = "GANTI_STATUS";
    public String GANTI_BONUS = "GANTI_BONUS";
    public String ID_TABEL = "ID_TABEL";

    // konstructor
    public SessionManager(Context context) {
        this.context = context;

        // membuat objek untuk menyimpan data didalam aplikasi (data sederhana)
        sharedPreferences = context.getSharedPreferences(PREF_NAME,PRIVATE_MODE);
        editor = sharedPreferences.edit();
    }

    public void createSession (String id_customer , String nm_customer , String almt_customer, String jenkel_customer ,String no_hp , String email ,String username){
        // menambah data kedalam session (penyimpanan) / sharedPreferences
        editor.putBoolean(LOGIN,true);
        editor.putString(ID_CUSTOMER,id_customer);
        editor.putString(NM_CUSTOMER,nm_customer);
        editor.putString(ALMT_CUSTOMER,almt_customer);
        editor.putString(JENKEL_CUSTOMER,jenkel_customer);
        editor.putString(NO_HP,no_hp);
        editor.putString(EMAIL,email);
        editor.putString(USERNAME,username);

        editor.apply();
    }

    public boolean isLogin(){

        // mengembalikan nilai yang diambil dari session
        return sharedPreferences.getBoolean(LOGIN,false);
    }

    public void checkLogin(){
        if (!this.isLogin()){
            Intent i = new Intent(context, FaceActivity.class);
            context.startActivity(i);
            ((AccountActivity) context).finish();
        }
    }

    public HashMap<String , String> getCustomerDetail(){
        // membuat objek
        HashMap<String,String> customer = new HashMap<>();

        // menambah data
        customer.put(ID_CUSTOMER,sharedPreferences.getString(ID_CUSTOMER,"KOSONG"));
        customer.put(NM_CUSTOMER, sharedPreferences.getString(NM_CUSTOMER,"KOSONG"));
        customer.put(ALMT_CUSTOMER,sharedPreferences.getString(ALMT_CUSTOMER,"KOSONG"));
        customer.put(JENKEL_CUSTOMER, sharedPreferences.getString(JENKEL_CUSTOMER,"KOSONG"));
        customer.put(NO_HP,sharedPreferences.getString(NO_HP,"KOSONG"));
        customer.put(EMAIL, sharedPreferences.getString(EMAIL,"KOSONG"));
        customer.put(USERNAME,sharedPreferences.getString(USERNAME,"KOSONG"));

        return customer;
    }

    public void logout(){
        Common.cartRepository.emptyCart();
        editor.clear();
        editor.commit();

        Intent i = new Intent(context, FaceActivity.class);
        context.startActivity(i);
        ((HomeActivity) context).finish();
    }

    public void setCart(boolean status,String id_paket,String nm_paket,String hrg_paket,String jml_menu,String jml_bonus){
        editor.putBoolean(CART_STATUS,status);
        editor.putString(ID_PAKET,id_paket);
        editor.putString(NM_PAKET,nm_paket);
        editor.putString(HRG_PAKET,hrg_paket);
        editor.putString(JML_MENU,jml_menu);
        editor.putString(JML_BONUS,jml_bonus);

        editor.apply();
    }

    public HashMap<String , String> getCartDetailPaket(){
        // membuat objek
        HashMap<String,String> cart = new HashMap<>();

        // menambah data
        cart.put(ID_PAKET, sharedPreferences.getString(ID_PAKET,"KOSONG"));
        cart.put(NM_PAKET,sharedPreferences.getString(NM_PAKET,"KOSONG"));
        cart.put(HRG_PAKET, sharedPreferences.getString(HRG_PAKET,"KOSONG"));
        cart.put(JML_MENU,sharedPreferences.getString(JML_MENU,"KOSONG"));
        cart.put(JML_BONUS, sharedPreferences.getString(JML_BONUS,"KOSONG"));

        return cart;
    }

    public boolean getCartStatus(){

        // mengembalikan nilai yang diambil dari session
        return sharedPreferences.getBoolean(CART_STATUS,false);
    }

    // untuk button ganti menu di dalam cart
    public void setDataGanti(boolean ganti_status,int id_tabel, boolean ganti_bonus){
        editor.putBoolean(GANTI_STATUS,ganti_status);
        editor.putInt(ID_TABEL,id_tabel);
        editor.putBoolean(GANTI_BONUS,ganti_bonus);

        editor.apply();
    }

    public int getIdTabel(){

        // mengembalikan nilai yang diambil dari session
        return sharedPreferences.getInt(ID_TABEL,0);
    }

    public boolean getGantiStatus(){

        // mengembalikan nilai yang diambil dari session
        return sharedPreferences.getBoolean(GANTI_STATUS,false);
    }

    public boolean getGantiBonus(){

        // mengembalikan nilai yang diambil dari session
        return sharedPreferences.getBoolean(GANTI_BONUS,false);
    }

}
