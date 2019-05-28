package com.example.sicat.adapter;

// tambahan

import android.content.Context;
import android.graphics.Bitmap;
import android.graphics.BitmapFactory;
import android.util.Base64;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.ImageView;
import android.widget.TextView;

import com.example.sicat.R;
import com.example.sicat.model.ModelDaftarMenu;
import com.squareup.picasso.Picasso;

import java.util.ArrayList;

public class ListAdapter extends BaseAdapter {

    // deklarasi objek variable
    private Context context;
    private ArrayList<ModelDaftarMenu> dataModelArrayList;

    // constractor
    public ListAdapter(Context context, ArrayList<ModelDaftarMenu> dataModelArrayList) {
        this.context = context;
        this.dataModelArrayList = dataModelArrayList;
    }

    @Override
    public int getViewTypeCount() {
        return getCount();
    }

    @Override
    public int getItemViewType(int position) {
        return position;
    }

    @Override
    public int getCount() {
        return dataModelArrayList.size();
    }

    @Override
    public Object getItem(int position) {
        return dataModelArrayList.get(position);
    }

    @Override
    public long getItemId(int position) {
        return 0;
    }

    @Override
    public View getView(int position, View convertView, ViewGroup parent) {
        ViewHolder holder;
        if (convertView == null) {
            holder = new ViewHolder();
            LayoutInflater inflater = (LayoutInflater) context.getSystemService(Context.LAYOUT_INFLATER_SERVICE);
            convertView = inflater.inflate(R.layout.list_item, null, true);
            holder.iv = (ImageView) convertView.findViewById(R.id.iv);
            holder.tvname = (TextView) convertView.findViewById(R.id.name);
            holder.tvcountry = (TextView) convertView.findViewById(R.id.country);
            holder.tvcity = (TextView) convertView.findViewById(R.id.city);
            convertView.setTag(holder);
        } else {
// the getTag returns the viewHolder object set as a tag to the view
            holder = (ViewHolder) convertView.getTag();
        }
        //Picasso.get().load(dataModelArrayList.get(position).getImgURL()).into(holder.iv); // Baris pertama akan memuat gambar dari URL menggunakan Picasso.
        // Compiler akan mengatur gambar ini di imageview.
        // Kemudian akan mengatur informasi lain di tampilan teks masing-masing.
        holder.tvname.setText("Nama Menu: " + dataModelArrayList.get(position).getNm_menu());
        holder.tvcountry.setText("kategori Menu: " + dataModelArrayList.get(position).getNm_kat());
        holder.tvcity.setText("Tipe: " + dataModelArrayList.get(position).getTipe());
        return convertView;
    }

    private class ViewHolder {
        protected TextView tvname, tvcountry, tvcity;
        protected ImageView iv;
    }

//    public ListAdapter(Context context, ArrayList<DataModel> dataModelArrayList) {
//        this.context = context;
//        this.dataModelArrayList = dataModelArrayList;
//    }
}
