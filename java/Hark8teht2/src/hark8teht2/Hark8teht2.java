/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package hark8teht2;
import java.io.*;
/**
 *
 * @author samu.lehtineva
 */
public class Hark8teht2 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        FileWriter ulos;
      boolean ok = true;
      String asia1 = "";
      while(ok) {
          System.out.println("Lisää runoon rivi tai laita exit lopettaaksesi: ");
          String salsa = Reader.readString();
          if(salsa.equals("exit")) {
              ok = false;              
          } else {
              ok = true;
              asia1 = asia1 + "\n" + salsa;
      }
      // Yritetään kirjoittaa
      try {
         // annetaan nimi
        ulos = new FileWriter("C:\\temp\\runo.txt");
         // kirjoitetaan tiedostoon
         
        ulos.write(asia1);
         // suljetaan tiedosto
        ulos.close();
      }
      catch (IOException e) {
         System.out.println("Error:" + e.getMessage());
      }
    }
    }
}
