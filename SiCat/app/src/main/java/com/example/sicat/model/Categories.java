package com.example.sicat.model;

import com.google.gson.annotations.Expose;
import com.google.gson.annotations.SerializedName;

import java.util.List;

public class Categories {

    @SerializedName("categories")
    @Expose
    private List<Category> categories;

    public List<Category> getCategories() {
        return categories;
    }

    public void setCategories(List<Category> categories) {
        this.categories = categories;
    }

    public static class Category {

        @SerializedName("id_kat")
        @Expose
        private String id_kat;

        @SerializedName("nm_kat")
        @Expose
        private String nm_kat;

        public void setId_kat(String id_kat){
            this.id_kat = id_kat;
        }
        public String getId_kat(){
            return id_kat;
        }

        public void setNm_kat(String nm_kat){
            this.nm_kat = nm_kat;
        }
        public String getNm_kat(){
            return nm_kat;
        }

    }
}
