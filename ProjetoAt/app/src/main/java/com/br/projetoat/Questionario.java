package com.br.projetoat;

import android.app.AlertDialog;
import android.app.ProgressDialog;
import android.content.Context;
import android.content.Intent;
import android.content.res.Resources;
import android.content.res.TypedArray;
import android.graphics.drawable.Drawable;
import android.os.AsyncTask;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;
import android.widget.Toast;

import com.br.projetoat.dao.Configuracao;
import com.br.projetoat.dao.RequestHandler;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;

public class Questionario extends AppCompatActivity {

    //Declarando variáveis e objetos
    public Bundle bundle = new Bundle();
    Button bttempo1, bttempo2, bttempo3, bttempo4, bttempo5;
    Button btate1, btate2, btate3, btate4, btate5;
    Button res1, res2, res3;
    int atendimento = 0, tempo_espera = 0, problema_resolvido = 0;
    TextView txtTempo, txtAtendimento, txtProblema;
    private int PIN;
    private int ID_NOTA;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_questionario);

        //Pegando os parametros passados da Activity passada
        bundle = getIntent().getExtras();

        //Inserindo falor do PIN em um INT local
        PIN = bundle.getInt("pin");

        //Começa ação para os botoes do tempo
        bttempo1 = (Button) findViewById(R.id.tempo1);
        bttempo2 = (Button) findViewById(R.id.tempo2);
        bttempo3 = (Button) findViewById(R.id.tempo3);
        bttempo4 = (Button) findViewById(R.id.tempo4);
        bttempo5 = (Button) findViewById(R.id.tempo5);

        //Campo usado para mostrar as notas votadas
        txtTempo = (TextView) findViewById(R.id.txtTempoGIF);
        txtAtendimento = (TextView) findViewById(R.id.txtAtendenteGIF);
        txtProblema = (TextView) findViewById(R.id.txtResolGIF);

        //Eventos das carinhas do Tempo para declarar a posição do array
        bttempo1.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Tempo(0);
            }
        });

        bttempo2.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Tempo(1);
            }
        });

        bttempo3.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Tempo(2);
            }
        });

        bttempo4.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Tempo(3);
            }
        });

        bttempo5.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Tempo(4);
            }
        });


        //Fim do Tempo

        //Começa a parte do Atendente

        //Eventos das carinhas do Atendente para declarar a posição do array
        //Botoes do atendente
        btate1 = (Button) findViewById(R.id.atendente1);
        btate2 = (Button) findViewById(R.id.atendente2);
        btate3 = (Button) findViewById(R.id.atendente3);
        btate4 = (Button) findViewById(R.id.atendente4);
        btate5 = (Button) findViewById(R.id.atendente5);


        btate1.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Atendente(0);
            }
        });

        btate2.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Atendente(1);
            }
        });

        btate3.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Atendente(2);
            }
        });

        btate4.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Atendente(3);
            }
        });

        btate5.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Atendente(4);
            }
        });

        //Fim do Atendente

        //Começa parte do resolvido
        //Eventos das carinhas do Problema Resolvido para declarar a posição do array
        res1 = (Button) findViewById(R.id.problema1);
        res2 = (Button) findViewById(R.id.problema2);
        res3 = (Button) findViewById(R.id.problema3);

        res1.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Resolvido(0);
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
                Resolvido(4);
            }
        });

        //Fim parte do resolvido

        //Parte do Finish

        Button finalizar = (Button) findViewById(R.id.fim);

        //Chama metodo para a promixa tela
        finalizar.setOnClickListener(onClickFinalizar());

        //Fim
    }


    //Metodo Tempo Recebe a nota
    public void Tempo(int v) {
        //Dando valor para a variável que irá para o BD +1 (array inicial é 0 por isso +1)
        //Validação de votos
        tempo_espera = (v + 1);

        //As notas são trazidas de um array chamado notas no array.xml
        Resources res = getResources();
        TypedArray icons = res.obtainTypedArray(R.array.notas);

        //Desenha a nota de acordo com index passado pelo botão pressionado
        Drawable img = icons.getDrawable(v);
        img.setBounds(0, 0, 100, 100);

        //Set pro textView a nota
        txtTempo.setCompoundDrawables(img, null, null, null);

        //txtTempo.setText(Integer.toString(notaTempo));

    }

    public void Atendente(int v) {

        //Dando valor para a variável que irá para o BD +1 (array inicial é 0 por isso +1)
        //Validação de votos
        atendimento = (v + 1);

        //As notas são trazidas de um array chamado notas no array.xml
        Resources res = getResources();
        TypedArray icons = res.obtainTypedArray(R.array.notas);

        //Desenha a nota de acordo com index passado pelo botão pressionado
        Drawable img = icons.getDrawable(v);
        img.setBounds(0, 0, 100, 100);

        //Set pro textView a nota
        txtAtendimento.setCompoundDrawables(img, null, null, null);

        // txtAtendimento.setText(Integer.toString(notaAte));
    }

    public void Resolvido(int v) {
        //Dando valor para a variável que irá para o BD +1 (array inicial é 0 por isso +1)
        //Validação de votos
        problema_resolvido = (v + 1);

        //As notas são trazidas de um array chamado notas no array.xml
        Resources res = getResources();
        TypedArray icons = res.obtainTypedArray(R.array.notas);

        //Desenha a nota de acordo com index passado pelo botão pressionado
        Drawable img = icons.getDrawable(v);
        img.setBounds(0, 0, 100, 100);

        //Set pro textView a nota
        txtProblema.setCompoundDrawables(img, null, null, null);

        //txtProblema.setText(Integer.toString(notaResolvido));
    }


    //Metodo para passar para a proxima tela
    private View.OnClickListener onClickFinalizar() {
        return new View.OnClickListener() {

            @Override
            public void onClick(View v) {
                //Validação de votos vazios
                if (tempo_espera == 0 || atendimento == 0 || problema_resolvido == 0) {

                    AlertDialog.Builder dialog = new AlertDialog.Builder(Questionario.this);
                    dialog.setTitle("Atenção!");
                    dialog.setMessage("Você esqueceu de Selecionar uma das carinhas! :)");
                    dialog.setNeutralButton("OK", null);
                    dialog.show();
                } else {
                    //Adicionando nota no BD
                    adicionarNota();

                }
            }
        };
    }

    //Retorna o ID em json da nota adicionada e valida a votação
    private void idRetornado(String json) {
        try {
            //Json que volta do PHP tem a informação de erro e o último ID_NOTA inserido
            JSONObject jsonObject = new JSONObject(json);
            String error = jsonObject.getString(Configuracao.TAG_ERROR);

            //Inserindo o valor do ID contido no JSON
            ID_NOTA = jsonObject.getInt("id");

            //Se retornar erro nulo no banco de dados, irá apresentar o erro na tela
            if (error != "null") {
                AlertDialog.Builder dialog = new AlertDialog.Builder(Questionario.this);
                dialog.setTitle("Atenção!");
                dialog.setMessage("Notas não registradas! Tente novamente! :)\n Error: " + error);
                dialog.setNeutralButton("OK", null);
                dialog.show();

            } else {
                //Update no atendimento
                updateAtendimento();
            }

        } catch (JSONException e) {
            e.printStackTrace();
        }
    }

    //Método para tratar erros do update da nota
    private void finalQuestionario(String json) {
        try {
            JSONObject jsonObject = new JSONObject(json);
            String error = jsonObject.getString(Configuracao.TAG_ERROR);

            //Se retornar erro nulo no banco de dados, irá apresentar o erro na tela
            if (error != "null") {
                AlertDialog.Builder dialog = new AlertDialog.Builder(Questionario.this);
                dialog.setTitle("Atenção!");
                dialog.setMessage("Notas não atualizadas! Tente novamente! :)\n Error: " + error);
                dialog.setNeutralButton("OK", null);
                dialog.show();

            } else {
                //Se o erro for nulo inicia outra tela
                Intent intent = new Intent(getContext(), Finish.class);
                startActivity(intent);
            }

        } catch (JSONException e) {
            e.printStackTrace();
        }
    }

    //Método para atualizar o atendimento como preenchido e o ID_NOTA
    public void updateAtendimento() {
        final String codigo = Integer.toString(PIN).trim();
        final String id_nota = Integer.toString(ID_NOTA).trim();

        class UpdateAtendimento extends AsyncTask<Void, Void, String> {

            ProgressDialog loading;

            @Override
            protected void onPreExecute() {
                super.onPreExecute();
                loading = ProgressDialog.show(Questionario.this, "Atualizando PIN...", "Espere por favor...", false, false);
            }

            @Override
            protected void onPostExecute(String s) {
                super.onPostExecute(s);
                loading.dismiss();
                finalQuestionario(s);
            }

            @Override
            protected String doInBackground(Void... v) {
                HashMap<String, String> params = new HashMap<>();
                params.put(Configuracao.KEY_NOTA_ID, id_nota);
                params.put(Configuracao.KEY_CODIGO, codigo);

                RequestHandler rh = new RequestHandler();
                String res = rh.sendPostStringRequest(Configuracao.URL_UPDATE_ATENDIMENTO, params);
                return res;
            }
        }

        UpdateAtendimento ua = new UpdateAtendimento();
        ua.execute();
    }

    //Método de adicionar nota no BD
    public void adicionarNota() {

        final String t = Integer.toString(tempo_espera).trim();
        final String a = Integer.toString(atendimento).trim();
        final String p = Integer.toString(problema_resolvido).trim();

        class AdicionarNota extends AsyncTask<Void, Void, String> {

            ProgressDialog loading;

            @Override
            protected void onPreExecute() {
                super.onPreExecute();
                loading = ProgressDialog.show(Questionario.this, "Registrando notas...", "Espere por favor...", false, false);
            }

            @Override
            protected void onPostExecute(String s) {
                super.onPostExecute(s);
                loading.dismiss();
                idRetornado(s);
            }

            @Override
            protected String doInBackground(Void... v) {
                HashMap<String, String> params = new HashMap<>();
                params.put(Configuracao.KEY_NOTA_TEMPO, t);
                params.put(Configuracao.KEY_NOTA_ATENDIMENTO, a);
                params.put(Configuracao.KEY_NOTA_PROBLEMA, p);

                RequestHandler rh = new RequestHandler();
                String res = rh.sendPostStringRequest(Configuracao.URL_ADICIONAR_NOTA, params);
                return res;
            }
        }
        AdicionarNota an = new AdicionarNota();
        an.execute();
    }


    private Context getContext() {
        return this;
    }


}
