/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package luokka;

/**
 *
 * @author samu.lehtineva
 */
public class Luokka {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        luokkaclass matinTili = new luokkaclass("Matin tili",100.50);
        luokkaclass omaTili = new luokkaclass("Oma tili", 0);
        matinTili.otto(100.0);
        omaTili.pano(100.0);
        System.out.println(matinTili);
        System.out.println(omaTili);
        
        double matilleLaskettuKorko = matinTili.laskekorko(matinTili.saldo());
        System.out.println(matilleLaskettuKorko);
        
    }
    
}
