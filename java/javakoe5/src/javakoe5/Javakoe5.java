package javakoe5;
import java.util.*;
import java.io.*;
/**
 *
 * @author samu.lehtineva
 */
public class Javakoe5 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        FileWriter ulos;
        String nimi ="";
        boolean ok = true;
        int kikka=0;
        while(ok) {
        System.out.println("1. Lisää asiakkaita");
        System.out.println("2. Tulosta rekisteri");
        System.out.println("3. Tyhjennä rekisteri");
        System.out.println("4. Lopeta");
        
        int luku1 = Reader.readInt();
        if(luku1 == 1){
            System.out.println("Etunimi :");
            String enimi = Reader.readString();
            System.out.println("Sukunimi");
            String snimi = Reader.readString();
            nimi = enimi+" "+snimi;
            try {
                // annetaan nimi
                ulos = new FileWriter("C:\\temp\\koe.txt");
                // kirjoitetaan tiedostoon

                ulos.write(nimi);
                // suljetaan tiedosto
                ulos.close();
            }
            catch (IOException e) {
                System.out.println("Error:" + e.getMessage());
            }
            
      } else if (luku1==2) {
          FileReader sisaan;
            // lippu joka kertoo koska tiedosto loppuu
            boolean loppu = false;
            BufferedReader puskuri;

            // Yritetään lukea tiedot
            try {
               // annetaan nimi
               sisaan = new FileReader("C:\\temp\\koe.txt");
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
      } else if(luku1==4) {
          ok = false;
      }
        }
        
    }
    
}
