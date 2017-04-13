package com.br.projetoat;

import android.content.Context;
import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;

public class Questionario extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_questionario);
        Button finalizar = (Button) findViewById(R.id.fim);
        finalizar.setOnClickListener(onClickFinalizar());
    }

    private View.OnClickListener onClickFinalizar() {
        return new View.OnClickListener(){

            @Override
            public void onClick(View v) {
                //EditText editPin = (EditText) findViewById(R.id.editPin);
                //Integer pin = Integer.parseInt(editPin.getText().toString());
                Intent intent = new Intent( getContext(),Finish.class);
                //Bundle params = new Bundle();
                //params.putInt("pin",pin);
                //intent.putExtras(params);
                //Pegar Notas
                startActivity(intent);


            }
        };
    }
    private Context getContext(){
        return this;
    }

}
