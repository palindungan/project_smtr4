package com.example.sicat.Database.ModelDB;

import android.arch.persistence.room.ColumnInfo;
import android.arch.persistence.room.Entity;
import android.arch.persistence.room.PrimaryKey;
import android.support.annotation.NonNull;

@Entity(tableName = "Cart")
public class Cart {

    @NonNull
    @PrimaryKey(autoGenerate = true)
    @ColumnInfo(name = "id")
    public int id;

    @ColumnInfo(name = "id_menu")
    public String id_menu;

    @ColumnInfo(name = "nm_menu")
    public String nm_menu;

    @ColumnInfo(name = "nm_kat")
    public String nm_kat;

    @ColumnInfo(name = "tipe")
    public String tipe;

    @ColumnInfo(name = "hrg_porsi")
    public int hrg_porsi;

    @ColumnInfo(name = "gambar")
    public String gambar;

    @ColumnInfo(name = "deskripsi")
    public String deskripsi;
}
