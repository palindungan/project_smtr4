package com.example.tugaspraktikum4;

import android.content.Context;
import android.content.Intent;
import android.content.res.TypedArray;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.view.ViewGroup;
import android.widget.AdapterView;
import android.widget.BaseAdapter;
import android.widget.Button;
import android.widget.Gallery;
import android.widget.ImageView;
import android.widget.Toast;

public class MainActivity extends AppCompatActivity {

    //membuat array untuk menyimpan gambar
    Integer[] imageIDs = {
            R.drawable.pic1,
            R.drawable.pic2,
            R.drawable.pic3,
            R.drawable.pic4,
            R.drawable.pic5,
            R.drawable.pic6,
            R.drawable.pic7};

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        // Deklarasi Button Menu
        Button b1 = (Button) findViewById(R.id.button);
        Button b2 = (Button) findViewById(R.id.button2);
        Button b3 = (Button) findViewById(R.id.button3);

        b1.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                startActivity(new Intent(MainActivity.this, MainActivity.class));
                finish();
            }
        });
        b2.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                startActivity(new Intent(MainActivity.this, Main2Activity.class));
                finish();
            }
        });
        b3.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                startActivity(new Intent(MainActivity.this, Main3Activity.class));
                finish();
            }
        });

        // mengambil nilai Gallery
        Gallery gallery = (Gallery) findViewById(R.id.gallery1);

        // Set adapter dengan ImageAdapter --> sebuah method di bawah (diluar onCreate)
        gallery.setAdapter(new ImageAdapter(this));

        // onclick Listerner pada Gallery bernama gallery
        gallery.setOnItemClickListener(new AdapterView.OnItemClickListener() {

            public void onItemClick(AdapterView parent, View v, int position, long id) {

                //menampilkan pesan Toast / text
                Toast.makeText(getBaseContext(), "pic" + (position + 1) + " selected", Toast.LENGTH_SHORT).show();

                // mengambil nilai ImageView bernama imageView
                ImageView imageView = (ImageView) findViewById(R.id.image1);

                // menaruh gambar yang di pilih ke imageView
                imageView.setImageResource(imageIDs[position]);
            }

        });

    }

    //method bernama ImageAdapter
    public class ImageAdapter extends BaseAdapter {
        private Context context;
        private int itemBackground;

        public ImageAdapter(Context c) {
            context = c;

            //setting the style
            TypedArray a = obtainStyledAttributes(R.styleable.Gallery1);
            itemBackground = a.getResourceId(R.styleable.Gallery1_android_galleryItemBackground, 0);
            a.recycle();
        }

        //---returns the number of images---
        public int getCount() {
            return imageIDs.length;
        }

        //---returns the ID of an item---
        public Object getItem(int position) {
            return position;
        }

        public long getItemId(int position) {
            return position;
        }

        //---returns an ImageView view--- gambar muncul pada gallery
        public View getView(int position, View convertView, ViewGroup parent) {
            ImageView imageView = new ImageView(context);
            imageView.setImageResource(imageIDs[position]);
            imageView.setScaleType(ImageView.ScaleType.FIT_XY);
            imageView.setLayoutParams(new Gallery.LayoutParams(400, 240));
            imageView.setBackgroundResource(itemBackground);
            return imageView;
        }
    }
}
