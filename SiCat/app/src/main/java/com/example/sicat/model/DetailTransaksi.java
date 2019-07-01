package com.example.sicat.model;

public class DetailTransaksi {

    String id_bonus,id_menu,nm_menu,id_kat,nm_kat,tipe,gambar,deskripsi;
    int hrg_porsi;

    public String getId_bonus() {
        return id_bonus;
    }

    public void setId_bonus(String id_bonus) {
        this.id_bonus = id_bonus;
    }

    public String getId_menu() {
        return id_menu;
    }

    public void setId_menu(String id_menu) {
        this.id_menu = id_menu;
    }

    public String getNm_menu() {
        return nm_menu;
    }

    public void setNm_menu(String nm_menu) {
        this.nm_menu = nm_menu;
    }

    public String getId_kat() {
        return id_kat;
    }

    public void setId_kat(String id_kat) {
        this.id_kat = id_kat;
    }

    public String getNm_kat() {
        return nm_kat;
    }

    public void setNm_kat(String nm_kat) {
        this.nm_kat = nm_kat;
    }

    public String getTipe() {
        return tipe;
    }

    public void setTipe(String tipe) {
        this.tipe = tipe;
    }

    public String getGambar() {
        return gambar;
    }

    public void setGambar(String gambar) {
        this.gambar = gambar;
    }

    public String getDeskripsi() {
        return deskripsi;
    }

    public void setDeskripsi(String deskripsi) {
        this.deskripsi = deskripsi;
    }

    public int getHrg_porsi() {
        return hrg_porsi;
    }

    public void setHrg_porsi(int hrg_porsi) {
        this.hrg_porsi = hrg_porsi;
    }
}
