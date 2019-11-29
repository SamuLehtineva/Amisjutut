/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package harj4teht1;
import java.util.*;
/**
 *
 * @author samu.lehtineva
 */
public class Harj4teht1 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        ArrayList<String> lista = new ArrayList<String>();
        
        while (true) {
            System.out.println("Anna tekstiä tai -1 jos haluat lopettaa");
            String luettu = Reader.readString();
            
            if(luettu.equals("-1")) {
                break;
            }
            lista.add(luettu);
        }
        String eka = lista.get(0);
        String vika = lista.get(lista.size()-1);
        
        System.out.println(eka + " " + vika);
        /*for(String teksti: lista) {
            
        }
        */
    }
    
}
