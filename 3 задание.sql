SELECT 
    users.name, communities.name, permissions.name
FROM
    communities,
    permissions,
    users
        JOIN
    community_members ON community_members.user_id = users.id
        JOIN
    community_member_permissions ON community_member_permissions.member_id = community_members.id
WHERE
    permissions.id = community_member_permissions.permission_id
        AND communities.id = community_members.community_id
        AND LENGTH(communities.name) >= 15
        AND (users.name LIKE '%T%'
			OR permissions.name LIKE '%articles%');