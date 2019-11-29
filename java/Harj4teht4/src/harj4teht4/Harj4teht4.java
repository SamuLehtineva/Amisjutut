/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package harj4teht4;
import java.util.*;
/**
 *
 * @author samu.lehtineva
 */
public class Harj4teht4 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        ArrayList<String> lista = new ArrayList<String>();
        lista.add("jee");
        lista.add("joo");
        lista.add("juu");
        for (int i = 0; i < lista.size(); i++) {
            System.out.println(lista.get(i));
        }
        String teksti1 = "asia";
        teksti1 = teksti1 + lista.get(2);
        lista.remove(2);
        teksti1 = teksti1.substring(4, 7);
        teksti1 = teksti1.toUpperCase();
        lista.add(teksti1);
        for (int i = 0; i < lista.size(); i++) {
            System.out.println(lista.get(i));
        }
    }
    
}
