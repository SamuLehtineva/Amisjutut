/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package harj9teht11;
import java.io.*;
/**
 *
 * @author samu.lehtineva
 */
public class Harj9teht11 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        FileWriter ulos;
      
      // Yritetään kirjoittaa
      try {
         // annetaan nimi
         ulos = new FileWriter("C:\\temp\\tiedosto.txt");
         // kirjoitetaan tiedostoon
         String asia1 = "jee\njoo\njuu";
         ulos.write(asia1);
         // suljetaan tiedosto
         ulos.close();
      }
      catch (IOException e) {
         System.out.println("Error:" + e.getMessage());
      }
    }
    
}
