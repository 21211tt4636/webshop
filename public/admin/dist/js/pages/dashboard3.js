ries>
			<remove invariant="Microsoft.SqlServerCe.Client"/>
			<remove invariant="Microsoft.SqlServerCe.Client.3.5"/>
			<remove invariant="Microsoft.SqlServerCe.Client.4.0"/>
			<add name="Microsoft SQL Server Compact 4.0 Client Data Provider" invariant="Microsoft.SqlServerCe.Client.4.0" description=".NET Framework Data Provider for Microsoft SQL Server Compact 4.0 Client" type="Microsoft.SqlServerCe.Client.SqlCeClientFactory, Microsoft.SqlServerCe.Client, Version=4.0.0.0, Culture=neutral, PublicKeyToken=89845dcd8080cc91"/>
		</DbProviderFactories>
	</system.data>
	<system.net>
		<settings>
			<ipv6 enabled="true"/>
		</settings>
	</system.net>
	<appSettings>
		<add key="TestProjectRetargetTo35Allowed" value="true"/>
		<add key="EnableWindowsFormsHighDpiAutoResizing" value="true"/>
	</appSettings>
	<system.drawing bitmapSuffix=".VisualStudio.11.0"/>
</configuration>