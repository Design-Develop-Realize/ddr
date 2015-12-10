<? 
// See the VB6 project that accompanies this sample for full code comments on how

// it works.

//

// ASP VBScript code for generating a SHA256 'digest' or 'signature' of a string. The// MD5 algorithm is one of the industry standard methods for generating digital

// signatures. It is generically known as a digest, digital signature, one-way

// encryption, hash or checksum algorithm. A common use for SHA256 is for password

// encryption as it is one-way in nature, that does not mean that your passwords

// are not free from a dictionary attack. 

//

// If you are using the routine for passwords, you can make it a little more secure

// by concatenating some known random characters to the password before you generate

// the signature and on subsequent tests, so even if a hacker knows you are using

// SHA-256 for your passwords, the random characters will make it harder to dictionary

// attack.

//

// NOTE: Due to the way in which the string is processed the routine assumes a

// single byte character set. VB passes unicode (2-byte) character strings, the

// ConvertToWordArray function uses on the first byte for each character. This

// has been done this way for ease of use, to make the routine truely portable

// you could accept a byte array instead, it would then be up to the calling

// routine to make sure that the byte array is generated from their string in

// a manner consistent with the string type.

//

// This is 'free' software with the following restrictions://

// You may not redistribute this code as a 'sample' or 'demo'. However, you are free// to use the source code in your own code, but you may not claim that you created

// the sample code. It is expressly forbidden to sell or profit from this source code

// other than by the knowledge gained or the enhanced value added by your own code.

//

// Use of this software is also done so at your own risk. The code is supplied as

// is without warranty or guarantee of any kind.

//

// Should you wish to commission some derivative work based on this code provided

// here, or any consultancy work, please do not hesitate to contact us.

//

// Web Site:  http://www.frez.co.uk

// E-mail:    sales@frez.co.uk




$m_lOnBits[0]=intval(1);
$m_lOnBits[1]=intval(3);
$m_lOnBits[2]=intval(7);
$m_lOnBits[3]=intval(15);
$m_lOnBits[4]=intval(31);
$m_lOnBits[5]=intval(63);
$m_lOnBits[6]=intval(127);
$m_lOnBits[7]=intval(255);
$m_lOnBits[8]=intval(511);
$m_lOnBits[9]=intval(1023);
$m_lOnBits[10]=intval(2047);
$m_lOnBits[11]=intval(4095);
$m_lOnBits[12]=intval(8191);
$m_lOnBits[13]=intval(16383);
$m_lOnBits[14]=intval(32767);
$m_lOnBits[15]=intval(65535);
$m_lOnBits[16]=intval(131071);
$m_lOnBits[17]=intval(262143);
$m_lOnBits[18]=intval(524287);
$m_lOnBits[19]=intval(1048575);
$m_lOnBits[20]=intval(2097151);
$m_lOnBits[21]=intval(4194303);
$m_lOnBits[22]=intval(8388607);
$m_lOnBits[23]=intval(16777215);
$m_lOnBits[24]=intval(33554431);
$m_lOnBits[25]=intval(67108863);
$m_lOnBits[26]=intval(134217727);
$m_lOnBits[27]=intval(268435455);
$m_lOnBits[28]=intval(536870911);
$m_lOnBits[29]=intval(1073741823);
$m_lOnBits[30]=intval(2147483647);

$m_l2Power[0]=intval(1);
$m_l2Power[1]=intval(2);
$m_l2Power[2]=intval(4);
$m_l2Power[3]=intval(8);
$m_l2Power[4]=intval(16);
$m_l2Power[5]=intval(32);
$m_l2Power[6]=intval(64);
$m_l2Power[7]=intval(128);
$m_l2Power[8]=intval(256);
$m_l2Power[9]=intval(512);
$m_l2Power[10]=intval(1024);
$m_l2Power[11]=intval(2048);
$m_l2Power[12]=intval(4096);
$m_l2Power[13]=intval(8192);
$m_l2Power[14]=intval(16384);
$m_l2Power[15]=intval(32768);
$m_l2Power[16]=intval(65536);
$m_l2Power[17]=intval(131072);
$m_l2Power[18]=intval(262144);
$m_l2Power[19]=intval(524288);
$m_l2Power[20]=intval(1048576);
$m_l2Power[21]=intval(2097152);
$m_l2Power[22]=intval(4194304);
$m_l2Power[23]=intval(8388608);
$m_l2Power[24]=intval(16777216);
$m_l2Power[25]=intval(33554432);
$m_l2Power[26]=intval(67108864);
$m_l2Power[27]=intval(134217728);
$m_l2Power[28]=intval(268435456);
$m_l2Power[29]=intval(536870912);
$m_l2Power[30]=intval(1073741824);

$K[0]=0x428$A2F98;
$K[1]=0x71374491;
$K[2]=0x$B5C0FBCF;
$K[3]=0x$E9B5DBA5;
$K[4]=0x3956$C25B;
$K[5]=0x59$F111F1;
$K[6]=0x923$F82A4;
$K[7]=0x$AB1C5ED5;
$K[8]=0x$D807AA98;
$K[9]=0x12835$B01;
$K[10]=0x243185$BE;
$K[11]=0x550$C7DC3;
$K[12]=0x72$BE5D74;
$K[13]=0x80$DEB1FE;
$K[14]=0x9$BDC06A7;
$K[15]=0x$C19BF174;
$K[16]=0x$E49B69C1;
$K[17]=0x$EFBE4786;
$K[18]=0x$FC19DC6;
$K[19]=0x240$CA1CC;
$K[20]=0x2$DE92C6F;
$K[21]=0x4$A7484AA;
$K[22]=0x5$CB0A9DC;
$K[23]=0x76$F988DA;
$K[24]=0x983$E5152;
$K[25]=0x$A831C66D;
$K[26]=0x$B00327C8;
$K[27]=0x$BF597FC7;
$K[28]=0x$C6E00BF3;
$K[29]=0x$D5A79147;
$K[30]=0x6$CA6351;
$K[31]=0x14292967;
$K[32]=0x27$B70A85;
$K[33]=0x2$E1B2138;
$K[34]=0x4$D2C6DFC;
$K[35]=0x53380$D13;
$K[36]=0x650$A7354;
$K[37]=0x766$A0ABB;
$K[38]=0x81$C2C92E;
$K[39]=0x92722$C85;
$K[40]=0x$A2BFE8A1;
$K[41]=0x$A81A664B;
$K[42]=0x$C24B8B70;
$K[43]=0x$C76C51A3;
$K[44]=0x$D192E819;
$K[45]=0x$D6990624;
$K[46]=0x$F40E3585;
$K[47]=0x106$AA070;
$K[48]=0x19$A4C116;
$K[49]=0x1$E376C08;
$K[50]=0x2748774$C;
$K[51]=0x34$B0BCB5;
$K[52]=0x391$C0CB3;
$K[53]=0x4$ED8AA4A;
$K[54]=0x5$B9CCA4F;
$K[55]=0x682$E6FF3;
$K[56]=0x748$F82EE;
$K[57]=0x78$A5636F;
$K[58]=0x84$C87814;
$K[59]=0x8$CC70208;
$K[60]=0x90$BEFFFA;
$K[61]=0x$A4506CEB;
$K[62]=0x$BEF9A3F7;
$K[63]=0x$C67178F2;

function LShift($lValue,$iShiftBits)
{
  extract($GLOBALS);


  if ($iShiftBits==0)
  {

    $LShift=$lValue;
    return $function_ret;

  }
    else
  if ($iShiftBits==31)
  {

    if ($lValue && 1)
    {

      $LShift=0x80000000;
    }
      else
    {

      $LShift=0;
    } 

    return $function_ret;

  }
    else
  if ($iShiftBits<0 || $iShiftBits>31)
  {

$Err->Raise6;
  } 


  if (($lValue && $m_l2Power[31-$iShiftBits]))
  {

    $LShift=(($lValue&$m_lOnBits[31-($iShiftBits+1)])*$m_l2Power[$iShiftBits])|0x80000000;
  }
    else
  {

    $LShift=(($lValue&$m_lOnBits[31-$iShiftBits])*$m_l2Power[$iShiftBits]);
  } 

  return $function_ret;
} 

function RShift($lValue,$iShiftBits)
{
  extract($GLOBALS);


  if ($iShiftBits==0)
  {

    $RShift=$lValue;
    return $function_ret;

  }
    else
  if ($iShiftBits==31)
  {

    if ($lValue && 0x80000000)
    {

      $RShift=1;
    }
      else
    {

      $RShift=0;
    } 

    return $function_ret;

  }
    else
  if ($iShiftBits<0 || $iShiftBits>31)
  {

$Err->Raise6;
  } 


  $RShift=($lValue&0x7$FFFFFFE)$\$m_l2Power[$iShiftBits];

  if (($lValue && 0x80000000))
  {

    $RShift=($RShift|(0x40000000$\$m_l2Power[$iShiftBits-1]));
  } 

  return $function_ret;
} 

function AddUnsigned($lX,$lY)
{
  extract($GLOBALS);



  $lX8=$lX&0x80000000;
  $lY8=$lY&0x80000000;
  $lX4=$lX&0x40000000;
  $lY4=$lY&0x40000000;

  $lResult=($lX&0x3$FFFFFFF)+($lY&0x3$FFFFFFF);

  if ($lX4 && $lY4)
  {

    $lResult=$lResult^0x80000000^$lX8^$lY8;
  }
    else
  if ($lX4 || $lY4)
  {

    if ($lResult && 0x40000000)
    {

      $lResult=$lResult^0x$C0000000^$lX8^$lY8;
    }
      else
    {

      $lResult=$lResult^0x40000000^$lX8^$lY8;
    } 

  }
    else
  {

    $lResult=$lResult^$lX8^$lY8;
  } 


  $AddUnsigned=$lResult;
  return $function_ret;
} 

function Ch($x,$y,$z)
{
  extract($GLOBALS);


  $Ch=(($x&$y)^(($Not$x)&$z));
  return $function_ret;
} 

function Maj($x,$y,$z)
{
  extract($GLOBALS);


  $Maj=(($x&$y)^($x&$z)^($y&$z));
  return $function_ret;
} 

function S($x,$n)
{
  extract($GLOBALS);


  $S=(RShift($x,($n&$m_lOnBits[4]))|LShift($x,(32-($n&$m_lOnBits[4]))));
  return $function_ret;
} 

function R($x,$n)
{
  extract($GLOBALS);


  $R=RShift($x,intval($n&$m_lOnBits[4]));
  return $function_ret;
} 

function Sigma0($x)
{
  extract($GLOBALS);


  $Sigma0=(S($x,2)^S($x,13)^S($x,22));
  return $function_ret;
} 

function Sigma1($x)
{
  extract($GLOBALS);


  $Sigma1=(S($x,6)^S($x,11)^S($x,25));
  return $function_ret;
} 

function Gamma0($x)
{
  extract($GLOBALS);


  $Gamma0=(S($x,7)^S($x,18)^R($x,3));
  return $function_ret;
} 

function Gamma1($x)
{
  extract($GLOBALS);


  $Gamma1=(S($x,17)^S($x,19)^R($x,10));
  return $function_ret;
} 

function ConvertToWordArray($sMessage)
{
  extract($GLOBALS);



  $MODULUS_BITS=512;
  $CONGRUENT_BITS=448;

  $lMessageLength=strlen($sMessage);

  $lNumberOfWords=((($lMessageLength+(($MODULUS_BITS-$CONGRUENT_BITS)$\$BITS_TO_A_BYTE))$\[$MODULUS_BITS$\$BITS_TO_A_BYTE])+1)*($MODULUS_BITS$\$BITS_TO_A_WORD);

  $lBytePosition=0;
  $lByteCount=0;
  while(!($lByteCount>=$lMessageLength))
  {

    $lWordCount=$lByteCount$\$BYTES_TO_A_WORD;

    $lBytePosition=(3-($lByteCount%$BYTES_TO_A_WORD))*$BITS_TO_A_BYTE;

    $lByte=$AscB[substr($sMessage,$lByteCount+1-1,1)];

    $lWordArray[$lWordCount]=$lWordArray[$lWordCount]|LShift($lByte,$lBytePosition);
    $lByteCount=$lByteCount+1;
  } 

  $lWordCount=$lByteCount$\$BYTES_TO_A_WORD;
  $lBytePosition=(3-($lByteCount%$BYTES_TO_A_WORD))*$BITS_TO_A_BYTE;

  $lWordArray[$lWordCount]=$lWordArray[$lWordCount]|LShift(0x80,$lBytePosition);

  $lWordArray[$lNumberOfWords-1]=LShift($lMessageLength,3);
  $lWordArray[$lNumberOfWords-2]=RShift($lMessageLength,29);

  $ConvertToWordArray=$lWordArray;
  return $function_ret;
} 

function SHA256($sMessage)
{
  extract($GLOBALS);



  $HASH[0]=0x6$A09E667;
  $HASH[1]=0x$BB67AE85;
  $HASH[2]=0x3$C6EF372;
  $HASH[3]=0x$A54FF53A;
  $HASH[4]=0x510$E527F;
  $HASH[5]=0x9$B05688C;
  $HASH[6]=0x1$F83D9AB;
  $HASH[7]=0x5$BE0CD19;

  $M=ConvertToWordArray($sMessage);

  for ($i=0; $i<=count($M); $i=$i+16)
  {
    $a=$HASH[0];
    $b=$HASH[1];
    $c=$HASH[2];
    $d=$HASH[3];
    $e=$HASH[4];
    $f=$HASH[5];
    $g=$HASH[6];
    $h=$HASH[7];

    for ($j=0; $j<=63; $j=$j+1)
    {

      if ($j<16)
      {

        $W[$j]=$M[$j+$i];
      }
        else
      {

        $W[$j]=AddUnsigned(AddUnsigned(AddUnsigned(Gamma1($W[$j-2]),$W[$j-7]),Gamma0($W[$j-15])),$W[$j-16]);
      } 


      $T1=AddUnsigned(AddUnsigned(AddUnsigned(AddUnsigned($h,Sigma1($e)),Ch($e,$f,$g)),$K[$j]),$W[$j]);
      $T2=AddUnsigned(Sigma0($a),Maj($a,$b,$c));

      $h=$g;
      $g=$f;
      $f=$e;
      $e=AddUnsigned($d,$T1);
      $d=$c;
      $c=$b;
      $b=$a;
      $a=AddUnsigned($T1,$T2);

    } 


    $HASH[0]=AddUnsigned($a,$HASH[0]);
    $HASH[1]=AddUnsigned($b,$HASH[1]);
    $HASH[2]=AddUnsigned($c,$HASH[2]);
    $HASH[3]=AddUnsigned($d,$HASH[3]);
    $HASH[4]=AddUnsigned($e,$HASH[4]);
    $HASH[5]=AddUnsigned($f,$HASH[5]);
    $HASH[6]=AddUnsigned($g,$HASH[6]);
    $HASH[7]=AddUnsigned($h,$HASH[7]);

  } 


  $SHA256=strtolower(substr("00000000".$Hex[$HASH[0]],strlen("00000000".$Hex[$HASH[0]])-(8)).substr("00000000".$Hex[$HASH[1]],strlen("00000000".$Hex[$HASH[1]])-(8)).substr("00000000".$Hex[$HASH[2]],strlen("00000000".$Hex[$HASH[2]])-(8)).substr("00000000".$Hex[$HASH[3]],strlen("00000000".$Hex[$HASH[3]])-(8)).substr("00000000".$Hex[$HASH[4]],strlen("00000000".$Hex[$HASH[4]])-(8)).substr("00000000".$Hex[$HASH[5]],strlen("00000000".$Hex[$HASH[5]])-(8)).substr("00000000".$Hex[$HASH[6]],strlen("00000000".$Hex[$HASH[6]])-(8)).substr("00000000".$Hex[$HASH[7]],strlen("00000000".$Hex[$HASH[7]])-(8)));
  return $function_ret;
} 
?>

