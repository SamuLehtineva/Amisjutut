/*
 * 10.1.2019
 * Samu Lehtineva
 */
package javaharj8;

/**
 *
 * @author samu.lehtineva
 */
public class Javaharj8 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        System.out.println("Anna pistemääräsi");
        int piste = Reader.readInt();
        
        //laskee arvosanasi
        if (piste > -1 && piste < 11) {
            System.out.println("Arvosanasi on 0");
        } else if (piste > 10 && piste < 21){
            System.out.println("Arvosanasi on 1");
        } else if (piste > 20 && piste < 31) {
            System.out.println("Arvosanasi on 2");
        } else if (piste > 30 && piste < 41) {
            System.out.println("Arvosanasi on 3");
        } else {
            System.out.println("Pistemääräsi ei ole hyäksytty");
        } 
    }
    
}
