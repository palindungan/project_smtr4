package com.example.sicat.controllers;

import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;

import com.example.sicat.activities.FaceActivity;
import com.example.sicat.activities.HomeActivity;
import com.example.sicat.activities.LoginActivity;

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
            ((HomeActivity) context).finish();
        }
    }

    public HashMap<String , String> getCustomerDetail(){
        // membuat objek
        HashMap<String,String> customer = new HashMap<>();

        // menambah data
        customer.put(ID_CUSTOMER,sharedPreferences.getString(ID_CUSTOMER,null));
        customer.put(NM_CUSTOMER, sharedPreferences.getString(NM_CUSTOMER,null));
        customer.put(ALMT_CUSTOMER,sharedPreferences.getString(ALMT_CUSTOMER,null));
        customer.put(JENKEL_CUSTOMER, sharedPreferences.getString(JENKEL_CUSTOMER,null));
        customer.put(NO_HP,sharedPreferences.getString(NO_HP,null));
        customer.put(EMAIL, sharedPreferences.getString(EMAIL,null));
        customer.put(USERNAME,sharedPreferences.getString(USERNAME,null));

        return customer;
    }

    public void logout(){
        editor.clear();
        editor.commit();

        Intent i = new Intent(context, FaceActivity.class);
        context.startActivity(i);
        ((HomeActivity) context).finish();
    }

    public void setCart(boolean status,String id_paket,String nm_paket){
        editor.putBoolean(CART_STATUS,status);
        editor.putString(ID_PAKET,id_paket);
        editor.putString(NM_PAKET,nm_paket);

        editor.apply();
    }

    public HashMap<String , String> getCartTittle(){
        // membuat objek
        HashMap<String,String> cart = new HashMap<>();

        // menambah data
        cart.put(ID_PAKET, sharedPreferences.getString(ID_PAKET,null));
        cart.put(NM_PAKET,sharedPreferences.getString(NM_PAKET,null));

        return cart;
    }

    public boolean getCartStatus(){

        // mengembalikan nilai yang diambil dari session
        return sharedPreferences.getBoolean(CART_STATUS,false);
    }

}
