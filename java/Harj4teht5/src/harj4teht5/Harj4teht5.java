/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package harj4teht5;
import java.util.*;
/**
 *
 * @author samu.lehtineva
 */
public class Harj4teht5 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        ArrayList<String> lista = new ArrayList<String>();
        
        while(true) {
            System.out.println("Anna tekstiä tai tyhjää jos haluat lopettaa");
            String teksti1 = Reader.readString();
            if (teksti1 == "") {
               break; 
            }
            lista.add(teksti1);
        }
        System.out.println("Etsi tekstiä: ");
        String teksti2 = Reader.readString();
        if(lista.contains(teksti2)) {
            System.out.println("löyty");
        }
    }
    
}
