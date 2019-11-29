/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package harj9teht12;
import java.io.*;
/**
 *
 * @author samu.lehtineva
 */
public class Harj9teht12 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        FileReader sisaan;
      // lippu joka kertoo koska tiedosto loppuu
      boolean loppu = false;
      BufferedReader puskuri;
      
      // Yritetään lukea tiedot
      try {
         // annetaan nimi
         sisaan = new FileReader("C:\\temp\\tiedosto.txt");
         // luetaan tiedot puskuriin
         puskuri = new BufferedReader(sisaan);
         
         // puskurista tiedot rivi kerrallaan
         String rivi = "";
         
         while (loppu == false) {
            rivi = "";
            try {
               rivi = puskuri.readLine();
            }
            catch (IOException e) {
               System.out.println("Error:" + e.getMessage());   
            }
            // mikäli luettu rivi ei tyhjä tulostetaan näytölle
            if (rivi != null) {
               System.out.println(rivi);
            }
            else {
               // mikäli tyhjä rivi, lopetetaan
               loppu = true;   
            }
         }
         // suljetaan tiedosto
         sisaan.close();
      }
      catch (IOException e) {
         System.out.println("Error:" + e.getMessage());
      }
    }
    
}
