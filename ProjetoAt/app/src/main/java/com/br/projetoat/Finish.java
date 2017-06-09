package com.br.projetoat;

import android.content.Intent;
import android.os.Handler;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;

public class Finish extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_finish);

        //A aplicação volta pra primeira tela depois de um tempo
        new Handler().postDelayed(new Runnable() {
            @Override
            public void run() {
                Intent startActivity = new Intent(Finish.this, MainActivity.class);
                startActivity(startActivity);
                finish();
            }
        }, 3000);
    }
}
