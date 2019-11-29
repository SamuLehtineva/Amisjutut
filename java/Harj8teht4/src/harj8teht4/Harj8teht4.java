/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package harj8teht4;
import java.io.*;
/**
 *
 * @author samu.lehtineva
 */
public class Harj8teht4 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        FileWriter ulos;
        // esitellään FileReader -olento
      FileReader sisaan;
      // lippu joka kertoo koska tiedosto loppuu
      boolean loppu = false;
      BufferedReader puskuri;
      
      // Yritetään lukea tiedot
      try {
         // annetaan nimi
         sisaan = new FileReader("C:\\temp\\runo.txt");
         ulos = new FileWriter("C:\\temp\\runo.html");
         // luetaan tiedot puskuriin
         puskuri = new BufferedReader(sisaan);
         
         // puskurista tiedot rivi kerrallaan
         String rivi = "";
         String asia1 = "<html>\n<h1>Runo</h1>\n<br>";
         String asia2 = "";
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
               asia2 = asia2 +"<h2>"+ rivi+"</h2>\n";
               
                // kirjoitetaan tiedostoon

               
                // suljetaan tiedosto
            }
            else {
               // mikäli tyhjä rivi, lopetetaan
               ulos.write(asia1 + asia2 + "</html>");
               loppu = true;     
            }
         }
         // suljetaan tiedosto
         sisaan.close();
         ulos.close();
      }
      catch (IOException e) {
         System.out.println("Error:" + e.getMessage());
      }
    }
    
}
