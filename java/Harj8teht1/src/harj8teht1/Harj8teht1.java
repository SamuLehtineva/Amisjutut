/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package harj8teht1;
import java.io.*;
/**
 *
 * @author samu.lehtineva
 */
public class Harj8teht1 {

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
         String asia1 = "Nimi: Samu \nOsoite: Katu10\nPuh: 01234";
         ulos.write(asia1);
         // suljetaan tiedosto
         ulos.close();
      }
      catch (IOException e) {
         System.out.println("Error:" + e.getMessage());
      }
        /**File file = new File("C:\\temp\\MyTest.txt");
        try {
            BufferedReader br = new BufferedReader (new FileReader(file));
            String st;
            while ((st = br.readLine()) !=null) {
                
            }
        } catch (Exception e) {
            
        }*/
    }
    
}
