package com.br.projetoat.dao;


import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;

public class Conexao {

    private static Connection connection = null;
    private static String host = "177.234.151.98";
    private static String port = "3306";
    private static String system = "centraln_atendimento";
    private static String user = "centraln_bilac";
    private static String pass = "DB[-_n!?xytk";
    private static java.sql.Statement stmt;

    public static Connection getConnection(){
        if(connection != null)
            return connection;
        else{
            try{
                Class.forName("com.mysql.jdbc.Driver").newInstance();
                connection = DriverManager.getConnection("jdbc:mysql://"
                        +host+":"
                        +port+"/"
                        +system+"/"
                        ,user,pass);
                stmt = connection.createStatement();

            }catch (SQLException ex){
            }catch (Exception e){
            }
            return connection;
        }
    }

}
