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

    public List<Meal> getMeals(){
        return meals;
    }
    public void setMeals(List<Meal> meals){
        this.meals = meals;
    }

    public class Meal {

        /*
         * TODO 9 Paste the generated results
         *
         * Paste the generated results Level 2 (Meal Item)
         */

        @SerializedName("id_menu")
        @Expose
        private String id_menu;

        @SerializedName("nm_menu")
        @Expose
        private String nm_menu;

        @SerializedName("nm_kat")
        @Expose
        private String nm_kat;

        @SerializedName("tipe")
        @Expose
        private String tipe;

        @SerializedName("hrg_porsi")
        @Expose
        private String hrg_porsi;

        @SerializedName("gambar")
        @Expose
        private String gambar;

        @SerializedName("deskripsi")
        @Expose
        private String deskripsi;

        @SerializedName("id_kat")
        @Expose
        private String id_kat;

        public void setId_menu(String id_menu){
            this.id_menu = id_menu;
        }
        public String getId_menu(){
            return id_menu;
        }

        public void setNm_menu(String nm_menu){
            this.nm_menu = nm_menu;
        }
        public String getNm_menu(){
            return nm_menu;
        }

        public void setNm_kat(String nm_kat){
            this.nm_kat = nm_kat;
        }
        public String getNm_kat(){
            return nm_kat;
        }

        public void setTipe(String tipe){
            this.tipe = tipe;
        }
        public String getTipe(){
            return tipe;
        }

        public void setHrg_porsi(String hrg_porsi){
            this.hrg_porsi = hrg_porsi;
        }
        public String getHrg_porsi(){
            return hrg_porsi;
        }

        public void setGambar(String gambar){
            this.gambar = gambar;
        }
        public String getGambar(){
            return gambar;
        }

        public void setDeskripsi(String deskripsi){
            this.deskripsi = deskripsi;
        }
        public String getDeskripsi(){
            return deskripsi;
        }

        public void setId_kat(String id_kat){
            this.id_kat = id_kat;
        }
        public String getId_kat(){
            return id_kat;
        }

    }
}
