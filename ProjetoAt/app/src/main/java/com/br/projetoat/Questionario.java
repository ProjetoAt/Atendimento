package com.br.projetoat;

import android.app.AlertDialog;
import android.content.Context;
import android.content.Intent;
import android.support.annotation.IntegerRes;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;

public class Questionario extends AppCompatActivity {

    //Tempo
    Button bttempo1,bttempo2,bttempo3,bttempo4,bttempo5;
    Button btate1,btate2,btate3,btate4,btate5;
    Button res1,res2,res3;
    int notaTempo=0, notaAte=0,notaResolvido=0;
    TextView teste,teste2,teste3;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_questionario);


        //Começa ação para os botoes do tempo
        bttempo1 = (Button) findViewById(R.id.tempo1);
        bttempo2 = (Button) findViewById(R.id.tempo2);
        bttempo3 = (Button) findViewById(R.id.tempo3);
        bttempo4 = (Button) findViewById(R.id.tempo4);
        bttempo5 = (Button) findViewById(R.id.tempo5);

        //Campo usado para teste
        teste = (TextView)findViewById(R.id.teste);
        teste2 = (TextView)findViewById(R.id.teste2);
        teste3 = (TextView)findViewById(R.id.teste3);


        bttempo1.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                Tempo(1);

            }
        });

        bttempo2.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Tempo(2);
            }
        });

        bttempo3.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Tempo(3);
            }
        });

        bttempo4.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Tempo(4);
            }
        });

        bttempo5.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                Tempo(5);
            }
        });


        //Fim do Tempo

        //Começa a parte do Atendente

        //Botoes do atendente
        btate1 = (Button)findViewById(R.id.atendente1);
        btate2 = (Button)findViewById(R.id.atendente2);
        btate3 = (Button)findViewById(R.id.atendente3);
        btate4 = (Button)findViewById(R.id.atendente4);
        btate5 = (Button)findViewById(R.id.atendente5);


        btate1.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Atendente(1);
            }
        });

        btate2.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Atendente(2);
            }
        });

        btate3.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Atendente(3);
            }
        });

        btate4.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Atendente(4);
            }
        });

        btate5.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Atendente(5);
            }
        });

        //Fim do Atendente

        //Começa parte do resolvido

        res1 = (Button)findViewById(R.id.problema1);
        res2 = (Button)findViewById(R.id.problema2);
        res3= (Button)findViewById(R.id.problema3);

        res1.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Resolvido(1);
            }
        });

        res2.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Resolvido(2);
            }
        });

        res3.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Resolvido(3);
            }
        });

        //Fim parte do resolvido

        //Parte do Finish

        Button finalizar = (Button) findViewById(R.id.fim);
        finalizar.setOnClickListener(onClickFinalizar());//Chama metodo para a promixa tela




        //Fim
    }


    //Metodo Tempo Recebe a nota
    public void Tempo(int t){

        notaTempo = t;


        teste.setText(Integer.toString(notaTempo));

    }

    public void Atendente(int v){

        notaAte = v;

        teste2.setText(Integer.toString(notaAte));
    }

    public void Resolvido(int v){

        notaResolvido = v;
        teste3.setText(Integer.toString(notaResolvido));
        return;
    }



    //Metodo para passar para a proxima tela
       private View.OnClickListener onClickFinalizar() {
        return new View.OnClickListener(){

            @Override
            public void onClick(View v) {

                if(notaTempo==0||notaAte==0||notaResolvido==0){

                    AlertDialog.Builder dialog = new AlertDialog.Builder(Questionario.this);
                    dialog.setTitle("Atenção");
                    dialog.setMessage("Você esqueceu de Selecionar uma das carinhas! :)");
                    dialog.setNeutralButton("OK",null);
                    dialog.show();
                }else{

                    //EditText editPin = (EditText) findViewById(R.id.editPin);
                    //Integer pin = Integer.parseInt(editPin.getText().toString());
                    Intent intent = new Intent( getContext(),Finish.class);
                    //Bundle params = new Bundle();
                    //params.putInt("pin",pin);
                    //intent.putExtras(params);
                    //Pegar Notas
                    startActivity(intent);
                }




            }
        };
    }
    private Context getContext(){
        return this;
    }




}
