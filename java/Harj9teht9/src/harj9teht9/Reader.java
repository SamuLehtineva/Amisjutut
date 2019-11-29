package harj9teht9;

import java.io.*;

/**
 * Tämä luokka lukee int, String, char, float, double tai boolean -tiedon
 * näppäimistöltä.
 * 
 * Käytä luokkaa seuraavasti:
 * - kopioi samaan kansioon harjoituksesi kanssa
 * - käännä tämä Reader.java (javac Reader.java
 * - käytä Readera harjoituksessasi seuraavasti:
 * 
 * int luku = Reader.readInt();
 * System.out.println("annoit " + luku);
 * 
 * tai
 * 
 * String sana = Reader.readString();
 * System.out.println("annoit " + sana);
 * 
 * @author eerikki.maula
 *
 */
public class Reader {
	// määritellään tietovirta näppäimistöltä, joka
	// annetaan buffn sisällöksi.
	static InputStreamReader istream = new InputStreamReader(System.in);
	static BufferedReader buff = new BufferedReader(istream);
	
	/**
	 * kokonaisluvun lukeminen
	 * 
	 * @return
	 */
	static public int readInt() {
		int iValue = 0;

		try {
			iValue = Integer.parseInt(buff.readLine());
		}
		catch (Exception e) {
			e.printStackTrace();
		}
		
		return iValue;
	}

	/**
	 * Merkkijonon lukeminen (String) 
	 * @return
	 */
	static public String readString() {
		// muuttuja syötettä varten, on hyvä antaa jokin alkustrValue.
		String strValue = "";
		
		// syöte voi olla virheellinen, siihen tulee varautua.
		try {
                        InputStreamReader astream = new InputStreamReader(System.in, "ISO-8859-15");
                        BufferedReader buffa = new BufferedReader(astream);
			strValue = buffa.readLine();
		}
		catch (Exception e) {
			e.printStackTrace();
		}
		
		return strValue;
	}
	
	/**
	 * desimaaliluku (float) :
	 * @return
	 */
	static public float readFloat() {
		float fValue = 0;

		try {
			fValue = Float.valueOf(buff.readLine()).floatValue();
		}
		catch (Exception e) {
			e.printStackTrace();
		}
		
		return fValue;
	}
	

	/**
	 * desimaaliluku (double) :
	 * @return
	 */
	static public double readDouble() {
		double dValue = 0;

		try {
			dValue = Double.valueOf(buff.readLine()).doubleValue();
		}
		catch (Exception e) {
			e.printStackTrace();
		}
		
		return dValue;
	}
	

	/**
	 * Merkki (char) :
	 * @return
	 */
	static public char readChar() {	
		char cValue = ' ';
		
		try {
		    cValue = (buff.readLine()).charAt(0);
		}
		catch (Exception e) {
			e.printStackTrace();
		}
		
		return cValue;
	}
	
	/**
	 * Loogisen tiedon pyytäminen (boolean) :
	 * @return
	 */
	static public boolean readBoolean() {
		boolean bLogical = true;
		try {
			bLogical = Boolean.valueOf(buff.readLine()).booleanValue();
		}
		catch (Exception e) {
			e.printStackTrace();
		}
		
		return bLogical;
	}
	    
}
