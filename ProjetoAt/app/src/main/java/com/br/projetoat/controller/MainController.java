package com.br.projetoat.controller;

import com.br.projetoat.dao.Conexao;
import com.br.projetoat.model.ModelMain;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;

public class MainController {

    private Connection connection;

    public MainController(){

        connection = Conexao.getConnection();
    }

    public void validarPIN(int pin){

        ModelMain m = new ModelMain();

        try{
            PreparedStatement preparedStatement = connection.prepareStatement("SELECT * FROM clientes WHERE ra=?");

            preparedStatement.setInt(1, pin);

            ResultSet rs = preparedStatement.executeQuery();

            if(rs.next()){
                m.setPin(rs.getInt("ra"));
            }

        }catch (SQLException e){
            e.printStackTrace();
        }
    }
}
