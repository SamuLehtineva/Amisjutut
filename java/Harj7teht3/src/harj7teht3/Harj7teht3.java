/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package harj7teht3;

/**
 *
 * @author samu.lehtineva
 */
public class Harj7teht3 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        boolean ok = true;
        
        while(ok) {
            System.out.println("Anna salasana: ");
            String salsa = Reader.readString();
            if(salsa.equals("1qwert2")) {
                ok = false;
                System.out.println("Salasana oikein");
                
            } else {
                ok = true;
                System.out.println("Salasana väärin");
                
        }
    }
}
}