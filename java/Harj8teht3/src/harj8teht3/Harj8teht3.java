/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package harj8teht3;
import java.io.*;
/**
 *
 * @author samu.lehtineva
 */
public class Harj8teht3 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        // esitellään FileReader -olento
      FileReader sisaan;
      // lippu joka kertoo koska tiedosto loppuu
      boolean loppu = false;
      BufferedReader puskuri;
      
      // Yritetään lukea tiedot
      try {
         // annetaan nimi
         sisaan = new FileReader("C:\\temp\\runo.txt");
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
