package com.example.sicat.model;

public class Paket {
    private String id_paket, nm_paket;
    private int hrg_paket, jml_menu, jml_bonus;

    public String getId_paket() {
        return id_paket;
    }

    public void setId_paket(String id_paket) {
        this.id_paket = id_paket;
    }

    public String getNm_paket() {
        return nm_paket;
    }

    public void setNm_paket(String nm_paket) {
        this.nm_paket = nm_paket;
    }

    public int getHrg_paket() {
        return hrg_paket;
    }

    public void setHrg_paket(int hrg_paket) {
        this.hrg_paket = hrg_paket;
    }

    public int getJml_menu() {
        return jml_menu;
    }

    public void setJml_menu(int jml_menu) {
        this.jml_menu = jml_menu;
    }

    public int getJml_bonus() {
        return jml_bonus;
    }

    public void setJml_bonus(int jml_bonus) {
        this.jml_bonus = jml_bonus;
    }

}
