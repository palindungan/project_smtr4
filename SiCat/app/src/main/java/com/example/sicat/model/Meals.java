package com.example.sicat.model;

import com.google.gson.annotations.Expose;
import com.google.gson.annotations.SerializedName;

import java.util.List;

public class Meals {

    /*
     * TODO 8 Paste the generated results
     *
     * Paste the generated results
     */

    @SerializedName("meals")
    @Expose
    private List<Meal> meals = null;
    @SerializedName("success")
    @Expose
    private String success;
    @SerializedName("message")
    @Expose
    private String message;

    public List<Meal> getMeals() {
        return meals;
    }

    public void setMeals(List<Meal> meals) {
        this.meals = meals;
    }

    public String getSuccess() {
        return success;
    }

    public void setSuccess(String success) {
        this.success = success;
    }

    public String getMessage() {
        return message;
    }

    public void setMessage(String message) {
        this.message = message;
    }
    public class Meal {
        /*
         * TODO 9 Paste the generated results
         *
         * Paste the generated results Level 2 (Meal Item)
         */

        @SerializedName("id_menu")
        @Expose
        private String idMenu;
        @SerializedName("nm_menu")
        @Expose
        private String nmMenu;
        @SerializedName("nm_kat")
        @Expose
        private String nmKat;
        @SerializedName("tipe")
        @Expose
        private String tipe;
        @SerializedName("hrg_porsi")
        @Expose
        private String hrgPorsi;
        @SerializedName("gambar")
        @Expose
        private String gambar;
        @SerializedName("deskripsi")
        @Expose
        private String deskripsi;
        @SerializedName("id_kat")
        @Expose
        private String idKat;

        public String getIdMenu() {
            return idMenu;
        }

        public void setIdMenu(String idMenu) {
            this.idMenu = idMenu;
        }

        public String getNmMenu() {
            return nmMenu;
        }

        public void setNmMenu(String nmMenu) {
            this.nmMenu = nmMenu;
        }

        public String getNmKat() {
            return nmKat;
        }

        public void setNmKat(String nmKat) {
            this.nmKat = nmKat;
        }

        public String getTipe() {
            return tipe;
        }

        public void setTipe(String tipe) {
            this.tipe = tipe;
        }

        public String getHrgPorsi() {
            return hrgPorsi;
        }

        public void setHrgPorsi(String hrgPorsi) {
            this.hrgPorsi = hrgPorsi;
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

        public String getIdKat() {
            return idKat;
        }

        public void setIdKat(String idKat) {
            this.idKat = idKat;
        }

    }
}
