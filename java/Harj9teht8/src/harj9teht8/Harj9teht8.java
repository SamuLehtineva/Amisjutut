/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package harj9teht8;
import java.util.*;

/**
 *
 * @author samu.lehtineva
 */
public class Harj9teht8 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        ArrayList<Integer> lista = new ArrayList<Integer>();
        lista.add(13);
        lista.add(56);
        lista.add(3);
        lista.add(134);
        lista.add(2);
        
        int luku1 = lista.get(0);
        int luku2 = 0;
        for (int i = 0; i < lista.size(); i++) {
            if (luku1 > lista.get(i)) {
                luku2 = lista.get(i);
            }
        }
        String luku3 = lista.get(2).toString();
        String jee = "pienin arvo: ";
        String asia = jee.concat(luku3);
        System.out.println(asia);
    }
    
}
