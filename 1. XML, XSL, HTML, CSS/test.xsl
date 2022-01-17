<?xml version="1.0" ?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" >
<xsl:output method="html" version="1.0" 
     indent="yes" doctype-system="about:legacy-compact" />
<!-- szablon dopasowujacy sie do korzenia dokumentu XML -->
<xsl:template match="/">
        <html>
            <head>
            <link rel="StyleSheet" href="style.css"  type="text/css" />
                <title>
                    Liga mistrzów
                </title>
            </head>
            <body>
                <h1>
                    Liga mistrzów 2021/2022
                </h1>
                <xsl:apply-templates select="rozgrywki/grupa[numer_grupy='Grupa A']" />
                <xsl:apply-templates select="rozgrywki/grupa[numer_grupy='Grupa B']" />
                <xsl:apply-templates select="rozgrywki/grupa[numer_grupy='Grupa C']" />
                <xsl:apply-templates select="rozgrywki/grupa[numer_grupy='Grupa D']" />
            <foot>
            <table id = "legenda">
            <tr><td> </td><td> Awans - Liga Mistrzów (Play Offy) </td></tr>
            <tr><td> </td><td> Awans - Liga Europy (Play Offy) </td></tr>
            <tr><td> </td><td> Brak awansu </td></tr>
            </table>
            </foot>
            </body>
        </html>
</xsl:template>
<xsl:template match="grupa">
  <h2><xsl:value-of select="./numer_grupy" /></h2>
  <table id ="grupa">
    <thead>
        <tr>
           <th>#</th>
           <th>Drużyna</th>
           <th>Ilość meczy</th>
           <th>Zwycięstwa</th>
           <th>Remisy</th>
           <th>Porażki</th>
           <th>Bilans</th>
           <th>Punkty</th>
        </tr>
    </thead>
        <xsl:for-each select="druzyna" >
           <xsl:sort select="punkty"  order="descending" data-type="number"/>
           <xsl:call-template name="druzyna" />
        </xsl:for-each>
  </table>
  <!--/xsl:if-->
</xsl:template>
<xsl:template name="druzyna" >
  <tr>
  <td><xsl:value-of select="pozycja" /></td>
   <td><xsl:value-of select="nazwa" /></td>
   <td><xsl:value-of select="mecze" /></td>
   <td><xsl:value-of select="zwyciestwa" /></td>
   <td><xsl:value-of select="remisy" /></td>
   <td><xsl:value-of select="porazki" /></td>
   <td><xsl:value-of select="bilans" /></td>
   <td><xsl:value-of select="punkty" /></td>
  </tr>
</xsl:template>
</xsl:stylesheet>
