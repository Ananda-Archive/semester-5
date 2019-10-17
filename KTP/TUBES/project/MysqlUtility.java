/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;

/**
 *
 * @author ShiningA
 */
public class MysqlUtility {
    private static Connection koneksi;
    
    public static Connection getConnection(){
        if(koneksi == null){
            try{
                Class.forName("com.mysql.jdbc.Driver");
                String url = "jdbc:mysql://localhost:3306/rmi1";
                String user = "root";
                String password = "";
                koneksi = DriverManager.getConnection(url, user, password);
                if(koneksi != null){
                    System.out.println("Koneksi berhasil");
                }
            }catch (ClassNotFoundException cne){
                System.out.println("Gagal load driver : " + cne.getMessage());
            }catch (SQLException sqle){
                System.out.println("Gagal Koneksi: " + sqle.getMessage());
            }
        }
    return koneksi;
    }
}
