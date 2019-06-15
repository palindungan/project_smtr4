package com.example.sicat.adapter;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.TextView;

import com.example.sicat.R;
import com.example.sicat.model.Paket;
import com.squareup.picasso.Picasso;

import java.util.ArrayList;

public class ListPaket extends BaseAdapter {

    private Context context;
    private ArrayList<Paket> dataModelArrayList;

    public ListPaket(Context context, ArrayList<Paket> dataModelArrayList) {
        this.context = context;
        this.dataModelArrayList = dataModelArrayList;
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
            convertView = inflater.inflate(R.layout.list_paket, null, true);
            holder.tv_id_paket = (TextView) convertView.findViewById(R.id.tv_id_paket);
            holder.tv_nm_paket = (TextView) convertView.findViewById(R.id.tv_nm_paket);
            holder.tv_hrg_paket = (TextView) convertView.findViewById(R.id.tv_hrg_paket);
            holder.tv_jml_menu = (TextView) convertView.findViewById(R.id.tv_jml_menu);
            holder.tv_jml_bonus = (TextView) convertView.findViewById(R.id.tv_jml_bonus);
            holder.btn_pilih = (Button) convertView.findViewById(R.id.btn_pilih);
            convertView.setTag(holder);
        } else {
        // the getTag returns the viewHolder object set as a tag to the view
            holder = (ViewHolder) convertView.getTag();
        }
        // Compiler akan mengatur gambar ini di imageview.
        // Kemudian akan mengatur informasi lain di tampilan teks masing-masing.
        holder.tv_id_paket.setText("ID : " + dataModelArrayList.get(position).getId_paket());
        holder.tv_nm_paket.setText("Nama Paket: " + dataModelArrayList.get(position).getNm_paket());
        holder.tv_hrg_paket.setText("Harga : " + dataModelArrayList.get(position).getHrg_paket());
        holder.tv_jml_menu.setText("Jumlah Menu : " + dataModelArrayList.get(position).getJml_menu());
        holder.tv_jml_bonus.setText("Jumlah Bonus: " + dataModelArrayList.get(position).getJml_bonus());
        return convertView;
    }

    // tambahan
    @Override
    public int getViewTypeCount() {
        return getCount();
    }

    @Override
    public int getItemViewType(int position) {
        return position;
    }

    private class ViewHolder {
        protected TextView tv_id_paket, tv_nm_paket, tv_hrg_paket,tv_jml_menu,tv_jml_bonus;
        protected Button btn_pilih;
    }
}
