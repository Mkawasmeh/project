package rgbimage;

import java.awt.image.BufferedImage;
import java.io.File;
import java.io.IOException;
import javax.imageio.ImageIO;
public class image {

	public static void main(String[] args) throws IOException {
		// TODO Auto-generated method stub
		System.out.println("kljlkjljl");
		
		
		String redpath ="C:\\Users\\pc\\Desktop\\Assignement#11111\\testImage_redOnly.jpg";
		String greenpath ="C:\\Users\\pc\\Desktop\\Assignement#11111\\testImage_greenOnly.jpg";
		String bluepath ="C:\\Users\\pc\\Desktop\\Assignement#11111\\testImage_blueOnly.jpg";
		String orgpath ="C:\\Users\\pc\\Desktop\\Assignement#11111\\testImage_org.jpg";
		String Rgraypath ="C:\\Users\\pc\\Desktop\\Assignement#11111\\testImage_redGray.jpg";
		String Ggraypath ="C:\\Users\\pc\\Desktop\\Assignement#11111\\testImage_greenGray.jpg";
		String Bgraypath ="C:\\Users\\pc\\Desktop\\Assignement#11111\\testImage_blueGray.jpg";
		
		File redfile = new File(redpath);
		File greenfile = new File(greenpath);
		File bluefile = new File(bluepath);
		File orgfile = new File(orgpath);
		File Rgrayfile = new File(Rgraypath);
		File Ggrayfile = new File(Ggraypath);
		File Bgrayfile = new File(Bgraypath);
		
		BufferedImage red_image = ImageIO.read(redfile);
		BufferedImage green_image = ImageIO.read(greenfile);
		BufferedImage blue_image = ImageIO.read(bluefile);
		BufferedImage org_image = new BufferedImage(red_image.getWidth(),red_image.getHeight(),red_image.getType());
		BufferedImage redGray_image = new BufferedImage(red_image.getWidth(),red_image.getHeight(),red_image.getType());
		BufferedImage greenGray_image = new BufferedImage(red_image.getWidth(),red_image.getHeight(),red_image.getType());
		BufferedImage blueGray_image = new BufferedImage(red_image.getWidth(),red_image.getHeight(),red_image.getType());

		int pixel, alpha, red , green, blue, gray, org ,Redgray, Greengray, Bluegray;
		
		for(int i=0 ; i<red_image.getWidth();i++) {
			
			for(int j =0; j<red_image.getHeight() ;j++ ) {
				
				pixel = red_image.getRGB(i,j) | green_image.getRGB(i,j) | blue_image.getRGB(i,j);
				
				alpha = (pixel>>24) & 0xFF;
				red = (pixel>>16) & 0xFF;
				green = (pixel>>8) & 0xFF;
				blue = (pixel>>0) & 0xFF;
				gray = ( red + green+ blue )/3;
				org=(alpha<<24)|(red<<16)|(green<<8)|(blue<<0); 
				
				org_image.setRGB(i, j, org);
				
				Redgray = (alpha<<24)|(red<<16)|((gray-green)<<8)|((gray-blue)<<0); 
				Greengray = (alpha<<24)|(gray<<16)|(green <<8)|(gray<<0); 
				Bluegray = (alpha<<24)|(gray<<16)|(gray<<8)|(blue<<0);
				
				redGray_image.setRGB(i, j, Redgray);
				greenGray_image.setRGB(i, j, Greengray);
				blueGray_image.setRGB(i, j, Bluegray);
			}
		}
		ImageIO.write(org_image, "jpg", orgfile);
		ImageIO.write(redGray_image, "jpg", Rgrayfile);
		ImageIO.write(greenGray_image, "jpg", Ggrayfile);
		ImageIO.write(blueGray_image, "jpg", Bgrayfile);
		
		
	}

}
