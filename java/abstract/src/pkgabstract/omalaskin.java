/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package pkgabstract;

import java.util.ArrayList;

/**
 *
 * @author samu.lehtineva
 */
public class omalaskin extends Lottorunko{
    private ArrayList<Integer> numbers;
    
    @Override
    public void arvonta() {
        this.numbers = new ArrayList<Integer>();
        this.teeNumerot();
    }

    @Override
    public ArrayList numerot() {
        return this.numbers;
    }

    @Override
    public void teeNumerot() {
        numbers.add(1);
        numbers.add(4);
        numbers.add(6);
    }

    @Override
    public boolean sisaltaaNumeron(int number) {
        return true;
    }

    @Override
    public String omaTulos() {
        throw new UnsupportedOperationException("Not supported yet."); //To change body of generated methods, choose Tools | Templates.
    }
}
