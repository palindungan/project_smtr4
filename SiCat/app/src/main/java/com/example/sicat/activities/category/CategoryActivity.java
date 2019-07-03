package com.example.sicat.activities.category;

import android.content.Intent;
import android.support.design.widget.TabLayout;
import android.support.v4.view.ViewPager;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.v7.widget.Toolbar;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.ImageView;

import com.example.sicat.R;
import com.example.sicat.activities.CartActivity;
import com.example.sicat.activities.DaftarBonusActivity;
import com.example.sicat.activities.daftar_menu.MenuActivity;
import com.example.sicat.adapter.ViewPagerCategoryAdapter;
import com.example.sicat.common.Common;
import com.example.sicat.model.Categories;
import com.nex3z.notificationbadge.NotificationBadge;

import java.util.List;

import butterknife.BindView;
import butterknife.ButterKnife;

public class CategoryActivity extends AppCompatActivity {

    // TODO 4. Annotate fields with @BindView and a view ID
    @BindView(R.id.toolbar)
    Toolbar toolbar;
    @BindView(R.id.tabLayout)
    TabLayout tabLayout;
    @BindView(R.id.viewPager)
    ViewPager viewPager;

    // untuk icon cart
    NotificationBadge badge;
    ImageView cart_icon;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_category);

        //TODO 5. Bind ButterKnife
        ButterKnife.bind(this);

        initActionBar();

        // TODO 9. Init GetIntent() data from home activity
        initIntent();

    }

    private void initIntent() {

        Intent intent = getIntent();
        List<Categories.Category> categories = (List<Categories.Category>) intent.getSerializableExtra(MenuActivity.EXTRA_CATEGORY);
        int position = intent.getIntExtra(MenuActivity.EXTRA_POSITION,0);

        // TODO 11. Declare fragment viewPager adapter
        ViewPagerCategoryAdapter adapter = new ViewPagerCategoryAdapter(getSupportFragmentManager(),categories);
        viewPager.setAdapter(adapter);
        tabLayout.setupWithViewPager(viewPager);
        viewPager.setCurrentItem(position,true);
        adapter.notifyDataSetChanged();
    }

    private void initActionBar(){
        setSupportActionBar(toolbar);
        if(getSupportActionBar() != null){
            getSupportActionBar().setDisplayHomeAsUpEnabled(true);
        }
    }

    // method untuk menciptakan option menu // untuk icon cart
    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        getMenuInflater().inflate(R.menu.menu_action_bar, menu);

        View view = menu.findItem(R.id.cart_menu).getActionView();
        badge = (NotificationBadge)view.findViewById(R.id.badge);
        cart_icon = (ImageView)view.findViewById(R.id.cart_icon);

        cart_icon.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                startActivity(new Intent(CategoryActivity.this, CartActivity.class));
            }
        });

        updateCartCount();

        return true;
    }

    // untuk icon cart
    private void updateCartCount() {
        if(badge == null) return;
        runOnUiThread(new Runnable() {
            @Override
            public void run() {
                if (Common.cartRepository.countCartItems() == 0)
                    badge.setVisibility(View.INVISIBLE);
                else {
                    badge.setVisibility(View.VISIBLE);
                    badge.setText(String.valueOf(Common.cartRepository.countCartItems()));
                }
            }
        });

    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item){
        switch (item.getItemId()){
            case android.R.id.home:
                onBackPressed();
                break;
            case R.id.cart_icon:
                // return true;
                break;
        }
        return true;
    }

    // untuk icon cart
    @Override
    protected void onResume() {
        super.onResume();
        updateCartCount();
    }
}
